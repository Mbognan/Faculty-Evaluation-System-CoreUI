<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassList extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'subject',
        'student_id',
        'evaluation_schedule_id',

    ];

    public function evaluationSchedule(){
       return $this->belongsTo(EvaluationSchedule::class , 'evaluation_schedule_id');
    }
}
