<?php

namespace App\Models;

use App\Models\User;
use App\Models\ClassModel;
use App\Scopes\TeacherScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends User
{

    use HasFactory;

    protected $table = 'users';

    protected $attributes = [
        'type' => User::TEACHER_TYPE,
    ];

    protected static function booted()
    {
        static::addGlobalScope(new TeacherScope);
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'class_id');
    }
}
