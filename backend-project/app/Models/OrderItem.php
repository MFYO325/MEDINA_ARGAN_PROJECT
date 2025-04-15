<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'quantity',
        'idavailable',
        'idorder',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'idorder');
    }

    public function availableProduct()
    {
        return $this->belongsTo(AvailableProduct::class, 'idavailable');
    }
}
