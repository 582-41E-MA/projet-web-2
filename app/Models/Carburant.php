<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\CarburantResource;

class Carburant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
    ];

    protected $casts = [
        'nom' => 'array'
    ];

    static public function carburants(){
        $resource = CarburantResource::collection(self::select()->orderBy('nom')->get());
        $data = json_encode($resource);
        return json_decode($data, true);
        
    }
}
