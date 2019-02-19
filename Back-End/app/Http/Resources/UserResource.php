<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;

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
        if($this->picture != null){
            return [
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'repository' => $this->repository,
                'birthday' => $this->birthday,
                'phone_number' => $this->phone_number,
                'description' => $this->description,

            ];
        }
    }
}
