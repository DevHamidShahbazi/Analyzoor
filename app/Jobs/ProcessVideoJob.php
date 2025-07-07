<?php

namespace App\Jobs;

use App\Models\Episode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProcessVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $episode;
    protected $videoPath;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * The maximum number of seconds the job can run.
     *
     * @var int
     */
    public $timeout = 3600; // 1 hour

    /**
     * Create a new job instance.
     */
    public function __construct(Episode $episode, $videoPath)
    {
        $this->episode = $episode;
        $this->videoPath = $videoPath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            Log::info('Starting video processing for episode: ' . $this->episode->id);

            $videoFullPath = storage_path('app/uploads/' . $this->videoPath);

            if (!File::exists($videoFullPath)) {
                Log::error('Video file not found: ' . $videoFullPath);
                return;
            }

            // Generate video thumbnail
            $thumbnailPath = $this->generateThumbnail($videoFullPath);

            // Get video information
            $videoInfo = $this->getVideoInfo($videoFullPath);

            // Optimize video if needed
            $optimizedPath = $this->optimizeVideo($videoFullPath);

            // Update episode with generated data
            $this->episode->update([
                'thumbnail' => $thumbnailPath,
                'video_info' => json_encode($videoInfo),
                'processed_at' => now()
            ]);

            Log::info('Video processing completed for episode: ' . $this->episode->id);

        } catch (\Exception $e) {
            Log::error('Video processing failed for episode: ' . $this->episode->id . ' - ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Generate video thumbnail
     */
    private function generateThumbnail($videoPath)
    {
        try {
            $thumbnailDir = storage_path('app/uploads/thumbnails/episodes');
            if (!File::exists($thumbnailDir)) {
                File::makeDirectory($thumbnailDir, 0755, true);
            }

            $thumbnailName = $this->episode->id . '_thumbnail.jpg';
            $thumbnailPath = $thumbnailDir . '/' . $thumbnailName;

            // Using FFmpeg to generate thumbnail
            $command = "ffmpeg -i \"{$videoPath}\" -ss 00:00:10 -vframes 1 -q:v 2 \"{$thumbnailPath}\" 2>&1";

            exec($command, $output, $returnCode);

            if ($returnCode === 0 && File::exists($thumbnailPath)) {
                return 'thumbnails/episodes/' . $thumbnailName;
            }

            // Fallback: Generate a default thumbnail
            return $this->generateDefaultThumbnail();

        } catch (\Exception $e) {
            Log::error('Thumbnail generation failed: ' . $e->getMessage());
            return $this->generateDefaultThumbnail();
        }
    }

    /**
     * Generate default thumbnail
     */
    private function generateDefaultThumbnail()
    {
        // Create a simple default thumbnail
        $thumbnailDir = storage_path('app/uploads/thumbnails/episodes');
        if (!File::exists($thumbnailDir)) {
            File::makeDirectory($thumbnailDir, 0755, true);
        }

        $thumbnailName = $this->episode->id . '_default.jpg';
        $thumbnailPath = $thumbnailDir . '/' . $thumbnailName;

        // Create a simple colored rectangle as default thumbnail
        $image = imagecreate(320, 180);
        $bgColor = imagecolorallocate($image, 50, 50, 50);
        $textColor = imagecolorallocate($image, 255, 255, 255);

        imagestring($image, 5, 120, 80, 'Video', $textColor);

        imagejpeg($image, $thumbnailPath, 80);
        imagedestroy($image);

        return 'thumbnails/episodes/' . $thumbnailName;
    }

    /**
     * Get video information
     */
    private function getVideoInfo($videoPath)
    {
        try {
            $command = "ffprobe -v quiet -print_format json -show_format -show_streams \"{$videoPath}\"";
            $output = shell_exec($command);

            if ($output) {
                $videoInfo = json_decode($output, true);

                $info = [
                    'duration' => $videoInfo['format']['duration'] ?? 0,
                    'size' => $videoInfo['format']['size'] ?? 0,
                    'bitrate' => $videoInfo['format']['bit_rate'] ?? 0,
                    'format' => $videoInfo['format']['format_name'] ?? 'unknown',
                ];

                // Get video stream info
                if (isset($videoInfo['streams'])) {
                    foreach ($videoInfo['streams'] as $stream) {
                        if ($stream['codec_type'] === 'video') {
                            $info['width'] = $stream['width'] ?? 0;
                            $info['height'] = $stream['height'] ?? 0;
                            $info['codec'] = $stream['codec_name'] ?? 'unknown';
                            $info['fps'] = $stream['r_frame_rate'] ?? '0/0';
                            break;
                        }
                    }
                }

                return $info;
            }

        } catch (\Exception $e) {
            Log::error('Getting video info failed: ' . $e->getMessage());
        }

        return [
            'duration' => 0,
            'size' => filesize($videoPath),
            'format' => 'unknown'
        ];
    }

    /**
     * Optimize video if needed
     */
    private function optimizeVideo($videoPath)
    {
        try {
            $videoInfo = $this->getVideoInfo($videoPath);

            // Only optimize if video is too large or in wrong format
            if ($videoInfo['size'] > 100 * 1024 * 1024) { // 100MB
                $optimizedDir = storage_path('app/uploads/optimized/episodes');
                if (!File::exists($optimizedDir)) {
                    File::makeDirectory($optimizedDir, 0755, true);
                }

                $optimizedName = $this->episode->id . '_optimized.mp4';
                $optimizedPath = $optimizedDir . '/' . $optimizedName;

                // Optimize using FFmpeg
                $command = "ffmpeg -i \"{$videoPath}\" -c:v libx264 -crf 23 -c:a aac -b:a 128k \"{$optimizedPath}\" 2>&1";

                exec($command, $output, $returnCode);

                if ($returnCode === 0 && File::exists($optimizedPath)) {
                    // Update episode with optimized video path
                    $this->episode->update([
                        'video_optimized' => 'optimized/episodes/' . $optimizedName
                    ]);

                    return 'optimized/episodes/' . $optimizedName;
                }
            }

        } catch (\Exception $e) {
            Log::error('Video optimization failed: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Handle job failure
     */
    public function failed(\Throwable $exception)
    {
        Log::error('Video processing job failed for episode: ' . $this->episode->id . ' - ' . $exception->getMessage());

        // Mark episode as failed processing
        $this->episode->update([
            'processing_failed' => true,
            'processing_error' => $exception->getMessage()
        ]);
    }
}
