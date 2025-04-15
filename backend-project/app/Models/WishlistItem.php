<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class WishlistItem extends Model
{
    use HasFactory;

    protected $table = 'wishlist_items';

    protected $fillable = [
        'idavailable',
        'wishlistid',
    ];

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'wishlistid');
    }

    public function availableProduct()
    {
        return $this->belongsTo(AvailableProduct::class, 'idavailable');
    }
}
