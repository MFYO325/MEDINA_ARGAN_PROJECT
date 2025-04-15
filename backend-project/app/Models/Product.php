<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'idcategorie',
        'name',
        'description',
        'unit',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'idcategorie');
    }

    public function availableProducts()
    {
        return $this->hasMany(AvailableProduct::class, 'idproduct');
    }
}
