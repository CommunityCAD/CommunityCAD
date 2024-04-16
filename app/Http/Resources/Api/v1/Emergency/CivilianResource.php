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
            "civilian_id" => $this->civilian_id,
            "type" => $this->type,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
            "civilian" => $this->text,
        ];
    }
}
