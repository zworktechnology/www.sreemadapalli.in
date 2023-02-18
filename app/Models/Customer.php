<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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

    public function breakfast()
    {
        return $this->hasMany(BreakFast::class, 'customer_id');
    }

    public function lunch()
    {
        return $this->hasMany(Lunch::class, 'customer_id');
    }

    public function dinner()
    {
        return $this->hasMany(Dinner::class, 'customer_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class, 'customer_id');
    }
}
