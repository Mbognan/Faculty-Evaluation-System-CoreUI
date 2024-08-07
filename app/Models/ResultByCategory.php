<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultByCategory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category_id', 'results_by_category','by_subject','semester_id','faculty_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function faculty(){
        return $this->belongsTo(User::class, 'faculty_id');
    }

    public function evaluation_schedule(){
        return $this->belongsTo(EvaluationSchedule::class, 'semester_id');
    }

}
