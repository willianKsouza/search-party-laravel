<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'user_name' => 'string|max:20',
            'email' => [
                'string',
                'email',
                Rule::unique('users')->ignore($this->user()->id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.max' => 'The user name must not exceed 20 characters.',
            'email.unique' => 'The email has already been taken.',
        ];
    }
}
