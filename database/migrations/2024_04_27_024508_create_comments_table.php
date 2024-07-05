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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('users')->where('user_type', 'faculty');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('post_comment');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('status')->default(0);
            $table->foreignId('evaluation_schedules_id')->constrained('evaluation_schedules')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
