<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarrosserieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $updated_at = explode("T", $this->updated_at);
        $timeUpdated = $updated_at[0];

        return [
            'id' => $this->id,
            'nom' => isset($this->nom[app()->getLocale()])? $this->nom[app()->getLocale()] : $this->nom['en'],
            'updated_at' => $timeUpdated,
        ];    
    }
}
