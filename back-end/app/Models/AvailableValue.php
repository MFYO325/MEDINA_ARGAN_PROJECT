<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AvailableValue extends Model
{
    protected $primaryKey = 'id_available_values';
    protected $fillable = ['id_product', 'id_img', 'real_price', 'sell_price', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function image()
    {
        return $this->belongsTo(Image::class, 'id_img');
    }
}