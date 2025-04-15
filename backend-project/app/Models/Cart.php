<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'userid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'cartid');
    }
}
