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
        Schema::create('raw_evaluation_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('user_id');
            $table->foreignId('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('users')->where('user_type', 'faculty');
            $table->foreignId('evaluation_schedules_id')->nullable();
            $table->foreignId('category_id');
            $table->integer('rating');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raw_evaluation_results');
    }
};
