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
            'Autor' => 'required|exists:autor,Cod_Autor',
            'Cod_Editorial' => 'required|exists:editorial,Cod_Editorial',
            'Edicion' => 'nullable|date',
            'Idioma' => 'required|string|max:255',
            'Estado' => 'required|exists:estado,Id_Estado',
            'NombreCategoria' => 'required|exists:categoria,Cod_Categoria',
            'Numero_Ejemplar' => 'required|integer',
            'Descripcion' => 'nullable|string',
            'CantPaginas' => 'required|integer',
            'CopiasDisp' => 'required|integer',
        ];
    }
}
