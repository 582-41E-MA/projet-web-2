<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'user_id',
    'voiture_id',
    'payment_id',
    'statut_id',
    'expedition_id',
    'date',
    'quantite',
    'prix',
    'create_at',
    'update_at'
    ];
}
