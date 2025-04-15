<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductImgs extends Model
{
    use HasFactory;

    
    protected $table = 'product_igms';

    protected $fillable = [
        'id_available',
        'image_path',
    ];

    public function availableProduct()
    {
        return $this->belongsTo(AvailableProduct::class, 'id_available');
    }
}
