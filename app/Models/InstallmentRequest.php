<?php

namespace App\Models;

use App\Models\BookProperty;
use App\Models\Admin\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstallmentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'property_number',
        'amount',
        'user_id',
        'installment_by',
        'status'
    ];

    public function property(){
        return $this->belongsTo(Property::class,'property_number','property_number');
    }

    public function bookProperty(){
        return $this->belongsTo(BookProperty::class,'booking_id');
    }

    public function bookedBy(){
        return $this->belongsTo(User::class,'installment_by');
    }
}
