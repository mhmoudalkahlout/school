<?php

namespace App\Models;

use App\Models\User;
use App\Scopes\AdminScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User
{

    use HasFactory;
    
    protected $table = 'users';

    protected $attributes = [
        'type' => User::ADMIN_TYPE,
    ];

    protected static function booted()
    {
        static::addGlobalScope(new AdminScope);
    }
}
