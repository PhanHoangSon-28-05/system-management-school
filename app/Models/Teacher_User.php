<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher_User extends Model
{
    use HasFactory;

    protected $table = 'teacher_user';
    protected $fillable = [
        'teacher_id',
        'user_id',
    ];
}
