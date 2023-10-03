<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VolunteerResource extends JsonResource
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
            'organization_id' => $this->organization_id,
            'organization' => new OrganizationResource($this->whenLoaded('organization')),
            'approve_id' => $this->approve_id,
            'job_termination_id' => $this->job_termination_id,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'third_name' => $this->third_name,
            'forth_name' => $this->forth_name,
            'nickname' => $this->nickname,
            'mother_first_name' => $this->mother_first_name,
            'mother_second_name' => $this->mother_second_name,
            'mother_third_name' => $this->mother_third_name,
            'birthdate' => $this->birthdate,
            'birthplace' => $this->birthplace,
            'father_birthdate' => $this->father_birthdate,
            'father_birthplace' => $this->father_birthplace,
            'city' => $this->city,
            'district' => $this->district,
            'nahiya' => $this->nahiya,
            'mahala' => $this->mahala,
            'zuqaq' => $this->zuqaq,
            'house_number' => $this->house_number,
            'nearest_point' => $this->nearest_point,
            'academic_achivement' => $this->academic_achivement,
            'is_married' => $this->is_married,
            'national_id_number' => $this->national_id_number,
            'have_volunteered' => $this->have_volunteered,
            'previous_location' => $this->previous_location,
            'belong_to_political_movement' => $this->belong_to_political_movement,
            'occupation' => $this->occupation,
            'phone_number' => $this->phone_number,
            'languages' => $this->languages,
            'code_number' => $this->code_number,
            'special_needs' => $this->special_needs,
            'diseases' => $this->diseases,
        ];
    }
}
