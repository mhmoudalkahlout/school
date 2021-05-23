<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    const FIRST_TYPE = 1;
    const MID_TYPE = 2;
    const FINAL_TYPE = 3;

    public function student()
    {
        return $this->hasOneThrough(
            'App\Models\Student',
            'App\Models\ClassStudent',
            'id',
            'id',
            'class_student_id',
            'student_id'
        );
    }

    public function class()
    {
        return $this->hasOneThrough(
            'App\Models\ClassModel',
            'App\Models\ClassStudent',
            'id',
            'id',
            'class_student_id',
            'class_id'
        );
    }   
}
