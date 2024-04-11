<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

<<<<<<< HEAD
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'principal',
        'voiture_id',
=======
    protected $fillable = [
        'id', 'nom', 'principal', 'voiture_id'
>>>>>>> ec10da0 (Ajouter une voiture)
    ];
}
