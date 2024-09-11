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
        Schema::create('evaluation_results', function (Blueprint $table) {
            $table->id();
            $table->string('by_subject');
            $table->integer('results_by_category');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->foreignId('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('users')->where('user_type', 'faculty');
            $table->foreignId('semester_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluation_results');
    }
};
