<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users')->ignore($this->user), 'regex:/^[a-z_][a-z_0-9]+$/'],
            'password' => ['required', 'regex:/[a-z0-9_-}{;!@#$%^&*()]+/i', 'min:6', 'max:20'],
            'type' => ['required', Rule::in('admin', 'user')],
            'organization_id' => ['nullable', Rule::exists('organizations', 'id')],
        ];
    }
}
