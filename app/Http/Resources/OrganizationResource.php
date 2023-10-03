<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'created_by' => $this->created_by,
            'user' => new UserResource($this->whenLoaded('user')),
            'volunteers' => VolunteerResource::collection($this->whenLoaded('volunteers')),
        ];
    }
}
