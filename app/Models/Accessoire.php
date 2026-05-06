<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessoire extends Model
{
    protected $table = 'accessoires';
    protected $fillable = [
        'nom',
        'prix',
        'stock',
        'categorie',
        'image'
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'accessoire_commande')
            ->withPivot('quantite');
    }
}
