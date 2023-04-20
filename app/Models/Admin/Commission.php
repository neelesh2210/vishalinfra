<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'property_id',
        'commission_amount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
