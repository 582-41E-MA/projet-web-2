<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\TractionResource;


class Traction extends Model
{
    use HasFactory;

    protected $casts = [
        'nom' => 'array',
    ];

    static public function tractions()
    {
        $resource = TractionResource::collection(self::select()->get());
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;
    }

    static public function tractionParId($id)
    {
        $resource = TractionResource::collection(self::select()->where('id', $id)->get());
        $data = json_encode($resource);
        $data = json_decode($data,true);

        return $data;
    }
}
