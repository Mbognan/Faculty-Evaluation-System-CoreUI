<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

     public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function evaluationResults()
    {
        return $this->hasMany(EvaluationResult::class);
    }

    public function result(){
        return $this->hasMany(ResultByCategory::class);
    }

}
