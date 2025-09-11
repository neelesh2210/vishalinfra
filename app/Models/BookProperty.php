<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin\Property;
use App\Models\Admin\Commission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_property_id',
        'property_id',
        'user_id',
        'booked_by',
        'emi_charge',
        'booked_type',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function associate(){
        return $this->belongsTo(User::class,'booked_by');
    }

    public function installments(){
        return $this->hasMany(Installment::class,'booking_id');
    }

    public function commissions(){
        return $this->hasManyThrough(Commission::class, Installment::class, 'booking_id', 'installment_id');
    }

}
