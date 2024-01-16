<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Detail_Schedule extends Model
{
    use HasFactory;
    protected $table = 'detail__schedules';

    protected $fillable = [
        'schedule_id',
        'subject_id',
        'room_id'
    ];

    public function subjects(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    public function rooms(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
