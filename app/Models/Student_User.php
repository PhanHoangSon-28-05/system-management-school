<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_User extends Model
{
    use HasFactory;

    protected $table = 'student_user';
    protected $fillable = [
        'student_id',
        'user_id',
    ];
}
