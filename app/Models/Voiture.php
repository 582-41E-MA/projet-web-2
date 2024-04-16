<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'marque_id',
        'modele_id',
        'annee_id',
        'transmission_id',
        'traction_id',
        'carburant_id',
        'carrossrie_id',
        'proprietaire',
        'date_arrive',
        'prix_paye',
        'prix_vente',
        'disponible'
        
        
    ];

    public function marque(){

        return $this->belongsTo(Marque::class);

    }
    

    public function modele(){

        return $this->belongsTo(Modele::class);

    }
    
    public function transmission(){

        return $this->belongsTo(Transmission::class);

    }
    public function carburant(){

        return $this->belongsTo(Carburant::class);

    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'voiture_id');
    }

}
