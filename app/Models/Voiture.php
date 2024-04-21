<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Voiture extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'marque_id',
        'modele_id',
        'annee_id',
        'transmission_id',
        'traction_id',
        'carburant_id',
        'carrosserie_id',
        'proprietaire',
        'date_arrive',
        'prix_paye',
        'prix_vente',
        'kilometrage',
        'disponible',
        'commande_id'
    ];


    public function marque() {
        return $this->belongsTo(Marque::class);
    }



    public function modele(){

        return $this->belongsTo(Modele::class);

    }

    public function annee() {
        return $this->belongsTo(Annee::class);
    }

    public function transmission() {
        return $this->belongsTo(Transmission::class);
    }

    public function traction() {
        return $this->belongsTo(Traction::class);
    }

    public function carburant() {
        return $this->belongsTo(Carburant::class);
    }

    public function carrosserie() {
        return $this->belongsTo(Carrosserie::class);
    }

}
