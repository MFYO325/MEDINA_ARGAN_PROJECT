<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableProduct extends Model
{
    use HasFactory;

    protected $table = 'available_products';

    protected $fillable = [
        'idproduct',
        'size',
        'real_price',
        'sell_price',
        'stock',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'idproduct');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'idavailable');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'idavailable');
    }

    public function productImgs()
    {
        return $this->hasMany(ProductImgs::class, 'id_available');
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class, 'idavailable');
    }

    
}
