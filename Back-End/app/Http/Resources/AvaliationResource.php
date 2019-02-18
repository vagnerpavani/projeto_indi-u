<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AvaliationResource extends JsonResource
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
          'Comentário: ' => $this->comment,
          'Nota: ' => $this->grade,
          'Usuário: ' => $this->id_user_measurer,
        ];
    }
}
