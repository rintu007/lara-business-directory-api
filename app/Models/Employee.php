<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = [
        'department_id', 'first_name', 'last_name',
        'email', 'password', 'position', 'hire_date'
    ];

    protected $hidden = ['password'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}