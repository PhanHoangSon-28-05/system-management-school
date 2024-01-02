<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [
        'name',
        'description',
        'slug'
    ];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'detail__departments', 'department_id', 'teacher_id');
    }
    public function grades(): BelongsToMany
    {
        return $this->belongsToMany(Grade::class, 'detail__departments', 'department_id', 'grade_id');
    }
}
