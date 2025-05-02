<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_product';
    protected $fillable = ['name', 'description', 'unit', 'id_category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function availableVolumes()
    {
        return $this->hasMany(AvailableVolume::class, 'id_product');
    }

    public function images()
    {
        return $this->hasManyThrough(Image::class, AvailableVolume::class, 'id_product', 'id_img');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'id_product');
    }
}