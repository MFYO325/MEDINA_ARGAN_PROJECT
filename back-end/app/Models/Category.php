<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'id_category';
    protected $fillable = ['category_name', 'id_perent_category'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'id_perent_category');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'id_perent_category');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category');
    }
}
