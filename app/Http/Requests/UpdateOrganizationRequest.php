<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'name' => ['nullable'],
            'code' => ['nullable', Rule::unique('organizations')->ignore($this->organization)],
            'created_by' => ['nullable', Rule::exists('users', 'id')],
        ];

    }
}
