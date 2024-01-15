<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    ];

    public function detail__class(): BelongsToMany
    {
        return $this->BelongsToMany(Grade::class, 'detail__classes', 'student_id', 'grade_id');
    }

    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'student_user', 'student_id', 'user_id');
    }
}
