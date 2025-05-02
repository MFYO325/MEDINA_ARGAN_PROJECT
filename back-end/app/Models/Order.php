<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $fillable = ['id_users', 'champ'];

    public function client()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'id_order');
    }
}
