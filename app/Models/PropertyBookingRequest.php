<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyBookingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'token_amount',
        'user_id',
        'request_status',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
