<?php

namespace App\Http\Resources;

use Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return [
        'id' => $this->id,
        'Trainer' => $this->name,
        'Pokémon' => $this->pokemon,
        'Código' => $this->codigo,
        'E-Mail' => $this->email,
      ];
    }
}
