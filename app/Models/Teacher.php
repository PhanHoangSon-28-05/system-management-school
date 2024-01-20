<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Teacher extends Model
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


    public function detail__departments(): BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'detail__departments', 'teacher_id', 'department_id');
    }

    public function detail_subjects(): BelongsTo
    {
        return $this->belongsTo(Detail_Teacher::class, 'id', 'teacher_id');
    }

    public function detail_classs(): BelongsTo
    {
        return $this->belongsTo(Detail_Class::class, 'id', 'teacher_id');
    }

    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'teacher_user', 'teacher_id', 'user_id');
    }
}
