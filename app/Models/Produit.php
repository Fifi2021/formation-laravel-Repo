<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable=[
        'uuid',
        'designation',
        'description',
        'prix',
        'like',
        'poids',
        'pays_source'

    ];

    public function CommandeparProduit()
    {
        return $this->hasMany(Commande::class);
    }


    public function Usersproduit()
    {
        return $this->belongsToMany(User::class);
    }

    

}
