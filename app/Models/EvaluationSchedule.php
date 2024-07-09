<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationSchedule extends Model
{
    use HasFactory;

    public function evaluation_schedules(){
       return  $this->hasMany(ClassList::class);
    }

    public function evaluation_schedule(){
        return  $this->hasMany(ResultByCategory::class);
     }

}
