<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'credit_hours',
        'total_number_of_periods',
        'description',
        'slug',
    ];

    public function detail_subjects(): BelongsTo
    {
        return $this->belongsTo(Detail_Teacher::class, 'subject_id', 'id');
    }
}
