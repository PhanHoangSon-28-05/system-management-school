<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends ModelsRole
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'group',
    ];

    protected static function booted()
    {
        static::creating(function ($roles) {
            $roles->guard_name = 'web';
        });
    }
}
