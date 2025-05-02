<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'id_img';
    protected $fillable = ['url'];

    public function availableVolumes()
    {
        return $this->hasMany(AvailableVolume::class, 'id_img');
    }
}