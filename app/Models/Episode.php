<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'slug', 'time', 'name', 'title','course_id','chapter_id',
        'description', 'keywords', 'body','type','video','file',
        'thumbnail', 'video_info', 'video_optimized', 'processed_at',
        'processing_failed', 'processing_error'
    ];

    protected $casts = [
        'video_info' => 'array',
        'processed_at' => 'datetime',
        'processing_failed' => 'boolean',
    ];

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function getCreatedDateAttribute()
    {
        return Verta::instance($this->attributes['created_at'])->format('Y-n-j');
    }
    public function getCreatedHourAttribute()
    {
        return Verta::instance($this->attributes['created_at'])->format('H:i');
    }

    /**
     * Check if video file actually exists on disk
     */
    public function hasVideoFile()
    {
        if (!$this->video) {
            return false;
        }
        
        return file_exists(storage_path('app/uploads/' . $this->video));
    }

    /**
     * Check if file actually exists on disk
     */
    public function hasFile()
    {
        if (!$this->file) {
            return false;
        }
        
        return file_exists(storage_path('app/uploads/' . $this->file));
    }

    /**
     * Get video file size in bytes
     */
    public function getVideoFileSize()
    {
        if (!$this->hasVideoFile()) {
            return 0;
        }
        
        return filesize(storage_path('app/uploads/' . $this->video));
    }

    /**
     * Get file size in bytes
     */
    public function getFileSize()
    {
        if (!$this->hasFile()) {
            return 0;
        }
        
        return filesize(storage_path('app/uploads/' . $this->file));
    }

    /**
     * Format file size for display
     */
    public function getFormattedVideoSize()
    {
        $size = $this->getVideoFileSize();
        return $this->formatFileSize($size);
    }

    /**
     * Format file size for display
     */
    public function getFormattedFileSize()
    {
        $size = $this->getFileSize();
        return $this->formatFileSize($size);
    }

    /**
     * Helper method to format file size
     */
    private function formatFileSize($size)
    {
        if ($size == 0) {
            return '0 B';
        }
        
        $units = ['B', 'KB', 'MB', 'GB'];
        $i = 0;
        
        while ($size >= 1024 && $i < count($units) - 1) {
            $size /= 1024;
            $i++;
        }
        
        return round($size, 2) . ' ' . $units[$i];
    }
}
