<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'teacher_id',
        'grade_id',
    ];

    public function departments(): BelongsTo
    {
        return $this->belongsTo(Detail_Department::class, 'department_id', 'id');
    }
}
