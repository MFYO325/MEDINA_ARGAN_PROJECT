<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $primaryKey = 'id_cart';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function items()
    {
        return $this->hasMany(CartItem::class, 'id_cart');
    }
}