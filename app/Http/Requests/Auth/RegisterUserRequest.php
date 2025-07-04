<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'user_name' => 'required|string|max:10|unique:users,user_name',
            'email' => 'required|string|email|max:20|unique:users,email',
            'password' => 'required|string|min:4|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'user_name.required' => 'O nome de usuário é obrigatório.',
            'user_name.unique' => 'Este nome de usuário já está em uso. Tente outro.',
            'user_name.max' => 'O nome de usuário deve ter no máximo 10 caracteres.',

            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'Informe um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',

            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter no mínimo 4 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ];
    }
}
