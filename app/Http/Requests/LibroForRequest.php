<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibroForRequest extends FormRequest
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
            'Titulo' => 'required|string|max:255',
            'Cod_Autor' => 'required|exists:autor,Cod_Autor',
            'Cod_Editorial' => 'required|exists:editorial,Cod_Editorial',
            'Edicion' => 'nullable|date',
            'Idioma' => 'required|string|max:255',
            'Cod_Estado' => 'required|exists:estado,Id_Estado',
            'Cod_Categoria' => 'required|exists:categoria,Cod_Categoria',
            'Numero_Ejemplar' => 'required|integer',
            'Descripcion' => 'nullable|string',
            'CantPaginas' => 'nullable|integer|min:0',
            'CopiasDisp' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'Titulo.required' => 'El título es obligatorio.',
            'Cod_Autor.required' => 'El autor es obligatorio.',
            'Cod_Editorial.required' => 'La editorial es obligatoria.',
            'Idioma.required' => 'El idioma es obligatorio.',
            'Cod_Estado.required' => 'El estado es obligatorio.',
            'Cod_Categoria.required' => 'La categoría es obligatoria.',
            'Numero_Ejemplar.required' => 'El número de ejemplar es obligatorio.',
            'CantPaginas.integer' => 'La cantidad de páginas debe ser un número entero.',
            'CopiasDisp.integer' => 'El número de copias disponibles debe ser un número entero.',
        ];
    }
}

