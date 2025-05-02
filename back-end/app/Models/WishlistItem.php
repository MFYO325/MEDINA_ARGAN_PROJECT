<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WishlistItem extends Model
{
    protected $primaryKey = 'id_wishlist_items';
    protected $fillable = ['id_wishlist', 'id_product'];

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'id_wishlist');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}