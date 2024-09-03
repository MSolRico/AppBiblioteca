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
        'Cod_Autor' => 'required|array',
        'Cod_Autor.*' => 'exists:autor,Cod_Autor',
        'Cod_editorial' => 'required|array',
        'Cod_editorial.*' => 'exists:editorial,Cod_editorial',
        'Cod_Categoria' => 'required|array',
        'Cod_Categoria.*' => 'exists:categoria,Cod_Categoria',
        'Edicion' => 'required|date',
        'Idioma' => 'required|string|max:255',
        'Id_Estado' => 'required|exists:estado,Id_Estado',
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
            'Cod_Autor.*.exists' => 'Uno o más autores seleccionados no existen.',
            'Editorial.required' => 'La editorial es obligatoria.',
            'Editorial.*.exists' => 'Una o más editoriales seleccionadas no existen.',
            'Idioma.required' => 'El idioma es obligatorio.',
            'Id_Estado.required' => 'El estado es obligatorio.',
            'Categoria.required' => 'La categoría es obligatoria.',
            'Categoria.*.exists' => 'Una o más categorías seleccionadas no existen.',
            'CantPaginas.integer' => 'La cantidad de páginas debe ser un número entero.',
            'CopiasDisp.integer' => 'El número de copias disponibles debe ser un número entero.',
        ];
    }
}
