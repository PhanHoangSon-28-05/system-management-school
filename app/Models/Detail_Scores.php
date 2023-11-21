<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Scores extends Model
{
    use HasFactory;

    protected $fillable = [
        'score_id',
        'attendance_grade',
        'scores_1',
        'scores_2',
        'final_grade',
        'scale_4',
    ];
}
