<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'cashier_id',
        'place_id',
        'proof_of_payment',
        'total',
        'note'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }


}
