<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Categoria;
use App\Models\Estado;
use Illuminate\Http\Request;
use App\Http\Requests\LibroForRequest;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::all();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        // Obtener datos para los desplegables
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $categorias = Categoria::all();
        $estados = Estado::all();

        return view('libros.create', compact('autores', 'editoriales', 'categorias', 'estados'));
    }

    public function store(LibroForRequest $request)
    {
    // Validar la solicitud y obtener los datos validados
    $validated = $request->validated();

    // Crear el libro usando los datos validados
    Libro::create([
        'Titulo' => $validated['Titulo'],
        'Autor' => $validated['Cod_Autor'], // Esto debe coincidir con la clave foránea y la estructura de la tabla
        'Editorial' => $validated['Cod_Editorial'], // Lo mismo aplica aquí
        'Edicion' => $validated['Edicion'],
        'Idioma' => $validated['Idioma'],
        'Estado' => $validated['Cod_Estado'], // Y aquí también
        'NombreCategoria' => $validated['Cod_Categoria'],
        'Numero_Ejemplar' => $validated['Numero_Ejemplar'],
        'Descripcion' => $validated['Descripcion'],
        'CantPaginas' => $validated['CantPaginas'],
        'CopiasDisp' => $validated['CopiasDisp'],
    ]);

    return redirect()->route('libros.index')->with('success', 'Libro agregado exitosamente');
    }



    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        // Obtener datos para los desplegables
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $categorias = Categoria::all();
        $estados = Estado::all();

        return view('libros.edit', compact('libro', 'autores', 'editoriales', 'categorias', 'estados'));
    }

    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'Titulo' => 'required|string|max:255',
            'Cod_Autor' => 'required|exists:autor,Cod_Autor',
            'Cod_Editorial' => 'required|exists:editorial,Cod_Editorial',
            'Edicion' => 'nullable|date',
            'Idioma' => 'required|string|max:255',
            'Cod_Estado' => 'required|exists:estado,Id_Estado',
            'Cod_Categoria' => 'required|exists:categoria,Cod_Categoria',
            'Numero_Ejemplar' => 'required|integer',
            'Descripcion' => 'nullable|string',
            'CantPaginas' => 'required|integer',
            'CopiasDisp' => 'required|integer',
        ]);

        // Encontrar el libro
        $libro = Libro::findOrFail($id);

        // Actualizar el libro
        $libro->update($validated);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
