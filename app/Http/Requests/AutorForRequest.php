<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorForRequest extends FormRequest
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
            'Cod_Autor' => 'required|int|max:10', 
            'NombreAutor' => 'required|string|max:256',
            'Descripcion' => 'nullable|string',
        ];
    }
}
