<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawEvaluationResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'user_id',
        'evaluation_schedules_id',
        'category_id',
        'rating',
        'faculty_id'
    ];
}
