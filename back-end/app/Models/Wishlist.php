<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $primaryKey = 'id_wishlist';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function items()
    {
        return $this->hasMany(WishlistItem::class, 'id_wishlist');
    }
}