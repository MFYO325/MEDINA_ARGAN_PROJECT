<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';

    protected $fillable = [
        'cartid',
        'idavailable',
        'quantite',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cartid');
    }

    public function availableProduct()
    {
        return $this->belongsTo(AvailableProduct::class, 'idavailable');
    }
}
