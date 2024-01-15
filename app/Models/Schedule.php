<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'grade_id',
        'rank_id',
        'period_id',
        'effect'
    ];

    public function detail_schedule(): BelongsTo
    {
        return $this->belongsTo(Detail_Schedule::class, 'id', 'schedule_id');
    }

    public function grades(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }
    public function ranks(): BelongsTo
    {
        return $this->belongsTo(Rank_Schedule::class, 'rank_id', 'id');
    }

    public function periods(): BelongsTo
    {
        return $this->belongsTo(Period::class, 'period_id', 'id');
    }
}
