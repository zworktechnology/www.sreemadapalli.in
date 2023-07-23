<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutdoorDetail extends Model
{
    use HasFactory;


    protected $fillable = [
        'outdoor_id',
        'outdoor_product',
        'outdoor_unit',
        'outdoor_price',
        'outdoor_total',
        'soft_delete'
    ];
}
