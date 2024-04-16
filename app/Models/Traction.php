<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\TractionResource;

class Traction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nom',
    ];

    protected $casts = [
        'nom' => 'array'
    ];

    static public function tractions(){
        $resource = TractionResource::collection(self::select()->orderBy('nom')->get());
        $data = json_encode($resource);
        return json_decode($data, true);
        
    }
}
