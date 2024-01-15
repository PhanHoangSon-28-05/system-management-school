<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Scores extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_id',
        'attendance',
        'scores_2_1',
        'scores_2_2',
        'final_score',
        'medium_score',
        'scale_4',
    ];
}
