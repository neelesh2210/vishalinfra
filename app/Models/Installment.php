<?php

namespace App\Models;

use App\Models\Admin\Commission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Installment extends Model
{
    use HasFactory;

    protected $fillabel = [
        'booking_id',
        'amount',
        'discount_amount',
        'final_amount',
        'taken_by',
        'taken_by_type',
        'reference_id',
        'payment_detail',
        'remark'
    ];

    public function commissions(){
        return $this->hasMany(Commission::class);
    }

    public function booking(){
        return $this->belongsTo(BookProperty::class);
    }
}
