<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Detail_Class extends Model
{
    use HasFactory;

    protected $fillable = [
        'grade_id',
        'student_id',
        'teacher_id',
        'descriptions',
        'status'
    ];

    public function teachers(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
