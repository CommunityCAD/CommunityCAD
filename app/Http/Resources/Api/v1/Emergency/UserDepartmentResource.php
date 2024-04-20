<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDepartmentResource extends JsonResource
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
            "badge_number" => $this->badge_number,
            "rank" => $this->rank,
            "department" => new DepartmentResource($this->department),
        ];
    }
}
