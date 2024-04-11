<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CarrosserieResource;


class Carrosserie extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'id',
        'nom',
    ];

    protected $casts = [
        'nom' => 'array',
    ];

    static public function carrosseries()
    {
        $resource = CarrosserieResource::collection(self::select()->get());
        
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;

    }

    static public function carrosserieParId($id)
    {
        $resource = CarrosserieResource::collection(self::select()->where('id', $id)->get());

        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;
    }
=======
    protected $casts = [
        'nom' => 'array',
    ];
>>>>>>> ec10da0 (Ajouter une voiture)
}
