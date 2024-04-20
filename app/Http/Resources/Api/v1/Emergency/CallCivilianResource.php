<?php

namespace App\Http\Resources\Api\v1\Emergency;

use App\Models\Civilian;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CallCivilianResource extends JsonResource
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
            "civilian_id" => $this->civilian_id,
            "type" => $this->type,
            "civilian" => new CivilianResource($this->civilian),
        ];
    }
}
