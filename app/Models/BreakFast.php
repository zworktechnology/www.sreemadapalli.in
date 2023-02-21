<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BreakFast extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'invoice_no',
        'delivery_boy_id',
        'bill_amount',
        'delivery_amount',
        'payment_amount',
        'payment_method',
        'soft_delete',
        'payment_status',
        'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function deliveryboy()
    {
        return $this->belongsTo(Deliveryboy::class, 'delivery_boy_id');
    }
}
