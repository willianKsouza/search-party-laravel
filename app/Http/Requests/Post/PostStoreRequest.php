<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|unique:posts,title',
            'body' => 'required|string',
            'categories' => ['required', 'array', 'min:1'],
            'categories.*' => ['integer', 'exists:categories,id', 'distinct'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser uma string.',
            'title.unique' => 'Este título já está em uso.',
            'body.required' => 'O corpo é obrigatório.',
            'body.string' => 'O corpo deve ser uma string.',
            'categories.required' => 'Selecione ao menos uma categoria.',
            'categories.array' => 'Categorias devem ser um array.',
            'categories.min' => 'Selecione ao menos uma categoria.',
            'categories.*.integer' => 'Cada categoria deve ser um número inteiro.',
            'categories.*.exists' => 'Categoria selecionada não existe.',
            'categories.*.distinct' => 'Categorias duplicadas não são permitidas.',
        ];
    }
}
