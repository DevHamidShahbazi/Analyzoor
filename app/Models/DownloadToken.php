<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DownloadToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'episode_id',
        'file_type',
        'expires_at',
        'used',
        'used_at',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
        'used' => 'boolean',
    ];

    /**
     * Generate a secure download token
     */
    public static function generateToken($userId, $episodeId, $fileType, $expiresInHours = 2)
    {
        // Clean up expired tokens for this user
        self::removeExpiredTokens($userId);
        
        // Clean up any existing tokens for this user and episode
        self::where('user_id', $userId)
            ->where('episode_id', $episodeId)
            ->where('file_type', $fileType)
            ->where('used', false)
            ->delete();

        return self::create([
            'token' => Str::random(64),
            'user_id' => $userId,
            'episode_id' => $episodeId,
            'file_type' => $fileType,
            'expires_at' => now()->addHours($expiresInHours),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }

    /**
     * Remove expired tokens for a user (similar to ActiveCode removeDuplicates)
     */
    private static function removeExpiredTokens($userId)
    {
        if (self::where('user_id', $userId)->where('expires_at', '<=', now())->first()) {
            self::where('user_id', $userId)->where('expires_at', '<=', now())->delete();
        }
    }

    /**
     * Check if token is valid and not expired
     */
    public function isValid()
    {
        return !$this->used && $this->expires_at->isFuture();
    }

    /**
     * Check if token is from same IP (additional security)
     */
    public function isFromSameIp()
    {
        return $this->ip_address === request()->ip();
    }

    /**
     * Mark token as used
     */
    public function markAsUsed()
    {
        $this->update([
            'used' => true,
            'used_at' => now()
        ]);
    }

    /**
     * Get the file path based on file type
     */
    public function getFilePath()
    {
        $episode = $this->episode;
        
        if ($this->file_type === 'video') {
            return $episode->video;
        }
        
        return $episode->file;
    }

    /**
     * Get the file name for download
     */
    public function getFileName()
    {
        $episode = $this->episode;
        $extension = pathinfo($this->getFilePath(), PATHINFO_EXTENSION);
        
        return $episode->name . '.' . $extension;
    }

    /**
     * Clean up expired tokens
     */
    public static function cleanupExpired()
    {
        return self::where('expires_at', '<', now())->delete();
    }

    /**
     * Get active tokens count for user
     */
    public static function getActiveTokensCount($userId)
    {
        return self::where('user_id', $userId)
            ->where('used', false)
            ->where('expires_at', '>', now())
            ->count();
    }

    /**
     * Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episode()
    {
        return $this->belongsTo(Episode::class);
    }
}
