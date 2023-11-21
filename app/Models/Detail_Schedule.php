<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank_id',
        'subject_id',
        'period',
        'room_id'
    ];
}
