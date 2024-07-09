<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','faculty_id','post_comment','evaluation_schedules_id','department_id'];
    public function sentiments(){
        return $this->hasMany(Sentiment::class);
    }

}
