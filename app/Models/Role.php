<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLES = [
        'admin'     => 'administrator',
        'client'    => 'client',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
