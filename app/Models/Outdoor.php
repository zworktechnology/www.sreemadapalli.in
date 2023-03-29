<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outdoor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'booking_date',
        'delivery_date',
        'status',
        'order_note',
        'note',
        'soft_delete'
    ];
}
