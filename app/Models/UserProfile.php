<?php

namespace App\Models;

use App\Models\Admin\LevelPercent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'avatar',
        'adhar_front',
        'adhar_back',
        'pan_front',
        'pan_back',
    ];

    public function levelPercent(){
        return $this->belongsTo(LevelPercent::class,'level','level');
    }
}
