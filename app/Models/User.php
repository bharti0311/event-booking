<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject; // add this

class User extends Authenticatable implements JWTSubject // implement JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ===== Required methods for JWT =====
    
    // Return the primary key of the user for JWT
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Return any custom claims to add to JWT
    public function getJWTCustomClaims()
    {
        return [];
    }
}
