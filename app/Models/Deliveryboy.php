<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliveryboy extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'name',
        'contact_number',
        'email_address',
        'address',
        'soft_delete'
    ];
}
