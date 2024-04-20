<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CallLogResource extends JsonResource
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
            "from" => $this->from,
            "text" => $this->text,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
        ];
    }
}
