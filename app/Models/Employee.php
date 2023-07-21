<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'name',
        'contact_number',
        'email_address',
        'salary_amount',
        'address',
        'soft_delete'
    ];

    public function expence()
    {
        return $this->hasMany(Expence::class, 'employee_id');
    }

    public function accountopen()
    {
        return $this->hasMany(AccountOpen::class, 'emp_id');
    }
}
