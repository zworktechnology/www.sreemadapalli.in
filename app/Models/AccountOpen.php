<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountOpen extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'amount',
        'emp_id',
        'note',
        'soft_delete'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
