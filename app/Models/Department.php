<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasMany(User::class);
    }

    public function college(){
        return $this->belongsTo(College::class);
    }
}
