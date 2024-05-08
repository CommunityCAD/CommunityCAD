<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficerResource extends JsonResource
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
            "formatted_name" => $this->formatted_name,
            "picture" => $this->picture,
            "date_of_birth" => $this->date_of_birth->format('m/d/Y'),
            "phone_number" => $this->phone_number,
            "gender" => $this->gender,
            "race" => $this->race,
            "postal" => $this->postal,
            "street" => $this->street,
            "city" => $this->city,
            'full_address' => $this->postal . ' ' . $this->street . ' ' . $this->city,
            "occupation" => $this->occupation,
            "height" => $this->height,
            "weight" => $this->weight,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
            "updated_at" => $this->updated_at->format('m/d/Y H:i:s'),
        ];
    }
}
