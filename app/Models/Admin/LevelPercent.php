<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPercent extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'percent',
        'amount',
        'reward'
    ];
}
