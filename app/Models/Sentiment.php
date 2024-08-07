<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sentiment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','faculty_id','subject','evaluation_schedules_id','comments_id','sentiment'];
    public function comments(){
        return $this->belongsTo(Comments::class);
    }
}
