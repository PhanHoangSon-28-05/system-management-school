<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rank_Schedule extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'slug'
    ];

    public function rank_schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'id', 'rank_id');
    }
}
