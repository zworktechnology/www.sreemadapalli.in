<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Determination extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'count_2000',
        'total_2000',
        'count_500',
        'total_500',
        'count_200',
        'total_200',
        'count_100',
        'total_100',
        'count_50',
        'total_50',
        'count_20',
        'total_20',
        'count_10',
        'total_10',
        'count_5',
        'total_5',
        'count_2',
        'total_2',
        'count_1',
        'total_1',
        'total',
        'soft_delete'
    ];
}
