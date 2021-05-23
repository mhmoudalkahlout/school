<?php

namespace App\Models;

use App\Models\User;
use App\Models\ClassModel;
use App\Scopes\StudentScope;

class Student extends User
{

    protected $table = 'users';

    protected $attributes = [
        'type' => User::STUDENT_TYPE,
    ];

    protected static function booted()
    {
        static::addGlobalScope(new StudentScope);
    }

    public function classes()
    {
        return $this->belongsToMany(ClassModel::class, 'class_student', 'student_id', 'class_id');
    }

    public function marks()
    {
        return $this->hasManyThrough(
            'App\Models\Mark',
            'App\Models\ClassStudent',
            'student_id',
            'class_student_id',
            'id',
            'id'
        );
    }   
}
