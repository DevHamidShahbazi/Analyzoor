<?php

namespace App\Console\Commands;

use App\Models\DownloadToken;
use Illuminate\Console\Command;

class CleanupExpiredDownloadTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download-tokens:cleanup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up expired download tokens';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedCount = DownloadToken::cleanupExpired();
        
        $this->info("Cleaned up {$deletedCount} expired download tokens.");
        
        return Command::SUCCESS;
    }
}
