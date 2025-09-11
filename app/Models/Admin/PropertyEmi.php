<?php

namespace App\Models\Admin;

use App\Models\Installment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyEmi extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'emi_date',
        'emi_amount',
        'discount_amount',
        'final_amount',
        'due_amount',
        'installment_detail',
        'discount_detail',
        'due_detail',
        'paid_status',
        'status'
    ];

    public function installment(){
        return $this->belongsTo(Installment::class,'installment_id');
    }
}
