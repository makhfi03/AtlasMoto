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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function accessoires()
    {
        return $this->belongsToMany(Accessoire::class, 'accessoire_commande')
            ->withPivot('quantite');
    }
}
