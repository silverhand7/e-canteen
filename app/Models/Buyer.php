<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Buyer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'jabatan',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value,
        );
    }
}
