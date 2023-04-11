<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jabatan',
        'username',
        'password',
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn (string|null $value) => $value,
            set: fn (string $value) => bcrypt($value),
        );
    }
}
