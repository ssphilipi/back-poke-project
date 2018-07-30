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
          'codigo' => $this->codigo,
          'nome' => $this->nome,
          'pokemon' => $this->pokemon,
          'user' => $user->name,
        ];
    }
}
