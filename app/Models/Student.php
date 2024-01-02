<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'image_personal',
        'image_citizenIdentification_front',
        'image_citizenIdentification_backside',
        'last_name',
        'first_name',
        'birthday',
        'gender',
        'email',
        'phone',
        'hometown',
        'slug',
        'user_id',
    ];

    public function detail__departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'detail__departments', 'student_id', 'department_id');
    }
}
