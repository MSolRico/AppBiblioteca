<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Categoria;
use App\Models\Estado;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'Titulo' => 'required|string|max:255',
            'Cod_Autor' => 'required|exists:autor,Cod_Autor',
            'Cod_Editorial' => 'required|exists:editorial,Cod_Editorial',
            'Cod_Categoria' => 'required|exists:categoria,Cod_Categoria',
            'Cod_Estado' => 'required|exists:estado,Id_Estado',
            'Idioma' => 'required|string|max:255',
            'Numero_Ejemplar' => 'required|integer',
            'Descripcion' => 'nullable|string',
            'CantPaginas' => 'required|integer',
            'CopiasDisp' => 'required|integer',
        ]);

        // Crear el libro
        Libro::create($validated);

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
            'Cod_Categoria' => 'required|exists:categoria,Cod_Categoria',
            'Cod_Estado' => 'required|exists:estado,Id_Estado',
            'Idioma' => 'required|string|max:255',
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
