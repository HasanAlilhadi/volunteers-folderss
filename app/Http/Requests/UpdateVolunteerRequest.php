<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'organization_id' => ['nullable'],
            'approve_id' => ['nullable'],
            'job_termination_id' => ['nullable'],
            'first_name' => ['nullable', 'string', 'max:255'],
            'second_name' => ['nullable', 'string', 'max:255'],
            'third_name' => ['nullable', 'string', 'max:255'],
            'forth_name' => ['nullable', 'string', 'max:255'],
            'nickname' => ['nullable', 'string', 'max:255'],
            'mother_first_name' => ['nullable', 'string', 'max:255'],
            'mother_second_name' => ['nullable', 'string', 'max:255'],
            'mother_third_name' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
            'birthplace' => ['nullable', 'string', 'max:255'],
            'father_birthdate' => ['nullable', 'date'],
            'father_birthplace' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'district' => ['nullable', 'string', 'max:255'],
            'nahiya' => ['nullable', 'string', 'max:255'],
            'mahala' => ['nullable', 'string', 'max:255'],
            'zuqaq' => ['nullable', 'string', 'max:255'],
            'house_number' => ['nullable', 'string', 'max:255'],
            'nearest_point' => ['nullable', 'string', 'max:255'],
            'academic_achivement' => ['nullable'],
            'is_married' => ['nullable'],
            'national_id_number' => ['nullable', 'string', 'max:255'],
            'have_volunteered' => ['nullable'],
            'previous_location' => ['nullable', 'string', 'max:255'],
            'belong_to_political_movement' => ['nullable'],
            'occupation' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255'],
            'languages' => ['nullable'],
            'code_number' => ['nullable', 'string', 'max:255'],
            'special_needs' => ['nullable'],
            'diseases' => ['nullable'],
        ];
    }
}
