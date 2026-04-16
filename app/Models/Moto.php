<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $fillable = [
        'name',
        'image',
        'immatriculation',
        'kilometrage',
        'categorieMoto',
        'description',
        'price_per_day',
        'status'
    ];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
