<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_users';
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'hashed_password', 'id_cart', 'id_wishlist'];
    protected $hidden = ['hashed_password'];
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'id_cart');
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class, 'id_wishlist');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_users');
    }
}