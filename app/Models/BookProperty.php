<?php

namespace App\Models;

use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'token_amount',
        'user_id',
        'staff_id',
        'payment_type',
        'payment_detail',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
