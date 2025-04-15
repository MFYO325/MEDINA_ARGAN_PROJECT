<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model

{
    use HasFactory;

    protected $table = 'wishlist';

    protected $fillable = [
        'userid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function wishlistItems()
    {
        return $this->hasMany(WishlistItem::class, 'wishlistid');
    }
}
