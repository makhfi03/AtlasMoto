<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'user_id',
        'items',
        'total',
        'mode_reception',
        'statut'
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
