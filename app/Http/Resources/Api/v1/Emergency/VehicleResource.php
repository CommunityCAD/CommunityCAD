<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            "plate" => $this->plate,
            "model" => $this->model,
            "color" => $this->color,
            "registration_expire" => $this->registration_expire->format('m/d/Y'),
            "civilian_id" => $this->civilian_id,
            "vehicle_status" => $this->vehicle_satatus,
            "status_name" => $this->status_name,
            "created_at" => $this->created_at->format('m/d/Y H:s:i'),
            "updated_at" => $this->updated_at->format('m/d/Y H:s:i'),
            "impound_ticket_id" => $this->impound_ticket_id,
            "picture" => $this->picture,
            "business_id" => $this->business_id
        ];
    }
}
