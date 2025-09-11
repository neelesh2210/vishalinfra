<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Installment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'installment_id',
        'user_id',
        'property_id',
        'commission_amount',
        'level',
        'percentage',
        'commission_type',
        'remark',
        'is_confirm'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function installment(){
        return $this->belongsTo(Installment::class)->latest();
    }
}
