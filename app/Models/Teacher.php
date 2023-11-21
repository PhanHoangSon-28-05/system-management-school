<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'image_personal',
        'image_citizenIdentification',
        'name',
        'birthday',
        'gender',
        'email',
        'phone',
        'hometown',
        'slug',
        'user_id',
    ];
}
