<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'idparentcategorie',
        'categorie_name',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'idparentcategorie');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'idcategorie');
    }
}
