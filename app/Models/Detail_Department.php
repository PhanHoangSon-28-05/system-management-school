<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'teacher_id',
        'grade_id',
    ];
}
