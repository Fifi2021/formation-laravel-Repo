<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable=[
        'uuid',
        'produit_id'        
    ];

    public function produitCommande()
    {
        return $this->belongsTo(Produit::class,'produit_id','id');
    }
}
