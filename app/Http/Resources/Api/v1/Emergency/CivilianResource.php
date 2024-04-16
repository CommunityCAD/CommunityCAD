<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CivilianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "full_name" => $this->first_name . ' ' . $this->last_name,
            "picture" => $this->picture,
            "date_of_birth" => $this->date_of_birth->format('m/d/Y'),
            "gender" => $this->gender,
            "race" => $this->race,
            "postal" => $this->postal,
            "street" => $this->street,
            "city" => $this->city,
            'full_address' => $this->postal . ' ' . $this->street . ' ' . $this->city,
            "occupation" => $this->occupation,
            "height" => $this->height,
            "weight" => $this->weight,
            "status" => $this->status,
            "status_name" => $this->status_name,
            "active_persona" => $this->active_persona,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
            "updated_at" => $this->updated_at->format('m/d/Y H:i:s'),
            "is_violent" => $this->is_violent,
            "is_weapon" => $this->is_weapon,
            "is_ill" => $this->is_ill,
            "is_swat" => $this->is_swat,
            "is_ciu" => $this->is_ciu,
            "is_warrant" => $this->is_warrant,
        ];
    }
}
