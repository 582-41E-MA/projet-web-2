<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\VilleResource;


class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
        'provence_id'
    ];

    protected $casts = [
        'nom' => 'array'
    ];

    static public function villes()
    {
        $resource = VilleResource::collection(self::select()->get());
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;

    }
}
