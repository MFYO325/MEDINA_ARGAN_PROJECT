<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users';

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'role',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class, 'userid');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'userid');
    }

    public function wishlist()
    {
        return $this->hasOne(Wishlist::class, 'userid');
    }

    public function payments()
{
    return $this->hasManyThrough(Payment::class, Order::class, 'userid', 'idorder');
}

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
