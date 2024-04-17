<?php

namespace App\Http\Resources\Api\v1\Emergency;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActiveUnitResource extends JsonResource
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
            "user_department_id" => $this->user_department_id,
            "officer_id" => $this->officer_id,
            "subdivision" => $this->subdivision,
            "description" => $this->description,
            "location" => $this->location,
            "status" => $this->status,
            "first_on_duty_at" => $this->first_on_duty_at->format('m/d/Y H:i:s'),
            "off_duty_at" => Carbon::parse($this->off_duty_at)->format('m/d/Y H:i:s'),
            "off_duty_type" => $this->off_duty_type,
            "is_panic" => $this->is_panic,
            "created_at" => $this->created_at->format('m/d/Y H:i:s'),
            "updated_at" => $this->updated_at->format('m/d/Y H:i:s'),
            "attached_calls" => CallResource::collection($this->calls),
            "officer" => new OfficerResource($this->officer),
            "user_department" => new UserDepartmentResource($this->user_department),
        ];
    }
}
