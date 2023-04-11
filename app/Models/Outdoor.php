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
        'note',
        'soft_delete',
        'field_title_1',
        'field_unit_1',
        'field_unit_price_1',
        'field_total_1',
        'field_title_2',
        'field_unit_2',
        'field_unit_price_2',
        'field_total_2',
        'field_title_3',
        'field_unit_3',
        'field_unit_price_3',
        'field_total_3',
        'field_title_4',
        'field_unit_4',
        'field_unit_price_4',
        'field_total_4',
        'field_title_5',
        'field_unit_5',
        'field_unit_price_5',
        'field_total_5',
        'field_title_6',
        'field_unit_6',
        'field_unit_price_6',
        'field_total_6',
        'field_title_7',
        'field_unit_7',
        'field_unit_price_7',
        'field_total_7',
        'field_title_8',
        'field_unit_8',
        'field_unit_price_8',
        'field_total_8',
        'field_title_9',
        'field_unit_9',
        'field_unit_price_9',
        'field_total_9',
        'field_title_10',
        'field_unit_10',
        'field_unit_price_10',
        'field_total_10',
        'over_all_total',
    ];
}
