<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'holder_name',
        'account_number',
        'ifsc_code',
        'bank_name',
        'branch_name',
        'upi_id',
    ];
}
