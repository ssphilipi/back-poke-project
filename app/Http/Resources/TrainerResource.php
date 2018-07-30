<?php

namespace App\Http\Resources;

use Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();
        return [
          'id' => $this->id,
          'Trainer' => $this->nome,
          'Pokémon' => $this->pokemon,
          'Código' => $this->codigo,
          'User' => $user->name,
          'E-Mail' => $user->email,
        ];
    }
}
