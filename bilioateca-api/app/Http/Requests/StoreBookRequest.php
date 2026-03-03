<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'isbn' => ['required','string'],
            'descricao' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'genero' => 'nullable|string',
            'published_at' => 'nullable|date',
            'total_copias' => 'required|integer|min:1',
            'copias_avalidas' => 'required|integer|min:1',
            'price' => 'nullable|numeric|min:0',
            'imagem_capa' => 'nullable|string',
            // 'status' => 'enum'
        ];
    }
}
