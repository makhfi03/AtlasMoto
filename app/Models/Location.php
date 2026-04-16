<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'user_id',
        'moto_id',
        'date_debut',
        'date_fin',
        'prix_total',
        'statut'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function moto()
    {
        return $this->belongsTo(Moto::class);
    }
}
