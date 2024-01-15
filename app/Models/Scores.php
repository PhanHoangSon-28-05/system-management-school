<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Scores extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'student_id',
        'teacher_id',
    ];

    public function subjects(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function detail_scores(): BelongsTo
    {
        return $this->belongsTo(Detail_Scores::class, 'id', 'score_id');
    }
}
