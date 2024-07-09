<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokenform extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','faculty_id','subject','evaluation_schedules_id'];
}
