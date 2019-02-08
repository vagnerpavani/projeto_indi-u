<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
          'Nome do Projeto: ' => $this->name,
          'Descrição: ' => $this->description,
          'Criador: ' => $this->user_id,
        ];
    }
}
