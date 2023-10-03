<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'min:3', 'max:255'],
            'username' => ['nullable', 'min:3', 'max:20', Rule::unique('users')->ignore($this->user), 'regex:/^[a-z_][a-z_0-9]+$/'],
            // 'username' => ['nullable', 'min:3', 'max:20', Rule::unique('users')->ignore($this->user), new NoNumbersOrSpecialCharactersRule],
            'password' => ['nullable', 'regex:/[a-z0-9_-}{;!@#$%^&*()]+/i', 'min:6', 'max:20'],
            'type' => ['nullable', Rule::in('admin', 'user')],
            'organization_id' => ['nullable', Rule::exists('organizations', 'id')],
        ];
    }
}