<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class Invite extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'email',
        'name',
        'contact',
        'role_id',
        'token'
    ];

    public function role()
    {
        return $this->hasMany(Role::class, 'role_id');
    }
}
