<?php

namespace App\Models;

use App\Models\Mark;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassStudent extends Model
{
    use HasFactory;

    protected $table = 'class_student';
    
    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}
