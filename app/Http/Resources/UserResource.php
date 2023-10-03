<?php

namespace App\Http\Resources;

use App\Http\Resources\OrganizationResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'username' => $this->username,
            'organization_id' => $this->organization_id,
            'organizations' => OrganizationResource::collection($this->whenLoaded('organizations')),
            'permissions' => PermissionResource::collection($this->whenLoaded('permissions')),
        ];
    }
}
