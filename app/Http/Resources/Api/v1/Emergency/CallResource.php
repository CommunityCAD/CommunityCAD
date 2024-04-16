<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CallResource extends JsonResource
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
            "nature" => $this->nature,
            "nature_name" => $this->nature_info['name'],
            "narrative" => $this->narrative,
            "location" => $this->location,
            "city" => $this->city,
            "priority" => $this->priority,
            "type" => $this->type,
            "status" => $this->status,
            "status_name" => $this->status_info['name'],
            "source" => $this->source,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
            "updated_at" => $this->updated_at->format('m/d/Y H:i:s'),
            "call_log" => CallLogResource::collection($this->call_log),
            "call_civilians" => $this->call_civilians,
            "call_vehicles" => $this->call_vehicles
        ];
    }
}
