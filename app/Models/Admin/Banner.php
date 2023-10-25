<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'form',
        'city_id',
        'image'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
}
