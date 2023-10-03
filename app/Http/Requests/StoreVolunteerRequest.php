<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVolunteerRequest extends FormRequest
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
            // 'organization_id' => ['required', Rule::exists('organizations', 'id')],
            // 'approve_id' => ['required', ['required', Rule::exists('approves', 'id')]],
            // 'job_termination_id' => ['required', ['required', Rule::exists('job_teminations', 'id')]],
            'organization_id' => ['required'],
            'approve_id' => ['required'],
            'job_termination_id' => ['required'],
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['required', 'string', 'max:255'],
            'third_name' => ['required', 'string', 'max:255'],
            'forth_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'mother_first_name' => ['required', 'string', 'max:255'],
            'mother_second_name' => ['required', 'string', 'max:255'],
            'mother_third_name' => ['required', 'string', 'max:255'],
            'birthdate' => ['required', 'date'],
            'birthplace' => ['required', 'string', 'max:255'],
            'father_birthdate' => ['required', 'date'],
            'father_birthplace' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'district' => ['required', 'string', 'max:255'],
            'nahiya' => ['required', 'string', 'max:255'],
            'mahala' => ['required', 'string', 'max:255'],
            'zuqaq' => ['required', 'string', 'max:255'],
            'house_number' => ['required', 'string', 'max:255'],
            'nearest_point' => ['required', 'string', 'max:255'],
            'academic_achivement' => ['required'],
            'is_married' => ['required'],
            'national_id_number' => ['required', 'string', 'max:255'],
            'have_volunteered' => ['required'],
            'previous_location' => ['nullable', 'string', 'max:255'],
            'belong_to_political_movement' => ['required'],
            'occupation' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'languages' => ['required'],
            'code_number' => ['required', 'string', 'max:255'],
            'special_needs' => ['required'],
            'diseases' => ['nullable'],
        ];
    }
}
