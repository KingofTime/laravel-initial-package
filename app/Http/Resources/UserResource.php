<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "login" => $this->login,
            "cpf" => $this->cpf,
            "email" => $this->email,
            "profile" => [
                "id" => $this->profile->id,
                "name" => $this->profile->name
            ]
        ];
    }
}
