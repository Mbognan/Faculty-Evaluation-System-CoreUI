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
        Schema::create('sentiments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('users')->where('user_type', 'faculty');
            $table->foreignid('comments_id')->constrained('comments');
            $table->enum('sentiment',['positive','negative','neutral']);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('evaluation_schedules_id')->constrained('evaluation_schedules')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sentiments');
    }
};
