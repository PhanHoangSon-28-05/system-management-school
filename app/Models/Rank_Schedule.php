<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank_Schedule extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'schedule_id',
        'name',
    ];
}
