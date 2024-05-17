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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->enum('level',['Developer','admin','user']);
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('verify',['0','1'])->default('0');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('image')->default('image/avatar/user.png');
            $table->string('password');
            $table->string('crypt');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
