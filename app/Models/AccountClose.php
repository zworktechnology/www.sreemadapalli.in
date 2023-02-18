<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountClose extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'case_on_hand',
        'g_pay',
        'phone_pay',
        'card',
        'other_case',
        'sales_amount',
        'soft_delete'
    ];
}
