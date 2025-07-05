<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class ChunkedUploadController extends Controller
{
    /**
     * Handle chunked file upload
     */
    public function upload(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'file' => 'required|file',
                'resumableChunkNumber' => 'required|integer',
                'resumableTotalChunks' => 'required|integer',
                'resumableIdentifier' => 'required|string',
                'resumableFilename' => 'required|string',
                'resumableChunkSize' => 'required|integer',
                'resumableTotalSize' => 'required|integer',
                'type' => 'required|in:video,file'
            ]);

            $identifier = $request->input('resumableIdentifier');
            $chunkNumber = $request->input('resumableChunkNumber');
            $totalChunks = $request->input('resumableTotalChunks');
            $filename = $request->input('resumableFilename');
            $type = $request->input('type');

            // Create temporary directory for chunks
            $tempDir = storage_path('app/temp/chunks/' . $identifier);
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir, 0755, true);
            }

            // Save chunk
            $chunkPath = $tempDir . '/chunk_' . $chunkNumber;
            $request->file('file')->move($tempDir, 'chunk_' . $chunkNumber);

            // Check if all chunks are uploaded
            $uploadedChunks = 0;
            for ($i = 1; $i <= $totalChunks; $i++) {
                if (File::exists($tempDir . '/chunk_' . $i)) {
                    $uploadedChunks++;
                }
            }

            if ($uploadedChunks == $totalChunks) {
                // All chunks uploaded, merge them
                $finalPath = $this->mergeChunks($identifier, $filename, $totalChunks, $type);

                // Clean up temporary chunks
                File::deleteDirectory($tempDir);

                return response()->json([
                    'success' => true,
                    'message' => 'Upload completed successfully',
                    'filename' => $finalPath,
                    'type' => $type,
                    'completed' => true
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Chunk uploaded successfully',
                'progress' => round(($uploadedChunks / $totalChunks) * 100, 2),
                'completed' => false
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if chunk already exists (for resumable uploads)
     */
    public function checkChunk(Request $request): JsonResponse
    {
        $identifier = $request->input('resumableIdentifier');
        $chunkNumber = $request->input('resumableChunkNumber');

        $chunkPath = storage_path('app/temp/chunks/' . $identifier . '/chunk_' . $chunkNumber);

        if (File::exists($chunkPath)) {
            return response()->json(['exists' => true]);
        }

        return response()->json(['exists' => false]);
    }

    /**
     * Merge all chunks into final file
     */
    private function mergeChunks($identifier, $filename, $totalChunks, $type): string
    {
        $tempDir = storage_path('app/temp/chunks/' . $identifier);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $finalFilename = Str::uuid() . '.' . $extension;

        // Create appropriate directory structure
        $uploadDir = storage_path('app/uploads/temp/' . $type);
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true);
        }

        $finalPath = $uploadDir . '/' . $finalFilename;

        // Merge chunks
        $finalFile = fopen($finalPath, 'wb');
        for ($i = 1; $i <= $totalChunks; $i++) {
            $chunkPath = $tempDir . '/chunk_' . $i;
            $chunkFile = fopen($chunkPath, 'rb');
            while (!feof($chunkFile)) {
                fwrite($finalFile, fread($chunkFile, 8192));
            }
            fclose($chunkFile);
        }
        fclose($finalFile);

        // Return relative path for database storage
        return 'temp/' . $type . '/' . $finalFilename;
    }

    /**
     * Move file from temp to final location
     */
    public function moveToFinalLocation(Request $request): JsonResponse
    {
        try {
            $tempPath = $request->input('temp_path');
            $finalPath = $request->input('final_path');

            $tempFullPath = storage_path('app/uploads/' . $tempPath);
            $finalFullPath = storage_path('app/uploads/' . $finalPath);

            // Create final directory if it doesn't exist
            $finalDir = dirname($finalFullPath);
            if (!File::exists($finalDir)) {
                File::makeDirectory($finalDir, 0755, true);
            }

            // Move file
            File::move($tempFullPath, $finalFullPath);

            return response()->json([
                'success' => true,
                'message' => 'File moved successfully',
                'path' => $finalPath
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to move file: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete temporary file
     */
    public function deleteTempFile(Request $request): JsonResponse
    {
        try {
            $tempPath = $request->input('temp_path');
            $fullPath = storage_path('app/uploads/' . $tempPath);

            if (File::exists($fullPath)) {
                File::delete($fullPath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Temporary file deleted successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete temporary file: ' . $e->getMessage()
            ], 500);
        }
    }
}
