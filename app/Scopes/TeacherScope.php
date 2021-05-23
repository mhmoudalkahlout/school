<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class TeacherScope implements Scope
{

	public function apply(Builder $builder, Model $model)
    {
        $builder->where('users.type', User::TEACHER_TYPE);
    }
	
}
