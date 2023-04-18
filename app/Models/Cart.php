<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'menu_id',
        'qty'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function getUserCart()
    {
        return Cart::query()
        ->joinMenu()
        ->where('buyer_id', auth()->guard('buyer')->user()?->id)->get();
    }

    public function getUserCartTotal()
    {
        return $this->getUserCart()->sum('qty');
    }

    public function scopeJoinMenu($query)
    {
        return $query->select(['carts.*', 'menus.name', 'menus.price'])
        ->join('menus', 'menus.id', '=', 'carts.menu_id');
    }
}
