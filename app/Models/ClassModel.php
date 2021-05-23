<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function marks()
    {
        return $this->hasManyThrough(
            'App\Models\Mark',
            'App\Models\ClassStudent',
            'class_id',
            'class_student_id',
            'id',
            'id'
        );
    } 
}
