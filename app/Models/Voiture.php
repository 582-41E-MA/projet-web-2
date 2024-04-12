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
        'disponible'
    ];
}
