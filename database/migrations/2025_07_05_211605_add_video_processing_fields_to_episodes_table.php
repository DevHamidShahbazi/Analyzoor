<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('file');
            $table->json('video_info')->nullable()->after('thumbnail');
            $table->string('video_optimized')->nullable()->after('video_info');
            $table->timestamp('processed_at')->nullable()->after('video_optimized');
            $table->boolean('processing_failed')->default(false)->after('processed_at');
            $table->text('processing_error')->nullable()->after('processing_failed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->dropColumn([
                'thumbnail',
                'video_info',
                'video_optimized',
                'processed_at',
                'processing_failed',
                'processing_error'
            ]);
        });
    }
};
