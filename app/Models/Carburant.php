<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CarburantResource;

class Carburant extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom'];

    protected $casts = [
        'nom' => 'array',
    ];

    static public function carburants()
    {
        $resource = CarburantResource::collection(self::select()->get());
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;
    }


    static public function carburantParId($id)
    {
        $resource = CarburantResource::collection(self::select()->where('id', $id)->get());
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;
    }
}
