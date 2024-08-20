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
        $libros = Libro::with('autor', 'editorial', 'categoria', 'estado')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $categorias = Categoria::all();
        $estados = Estado::all();

        return view('libros.create', compact('autores', 'editoriales', 'categorias', 'estados'));
    }

    public function store(LibroForRequest $request)
    {
        $validated = $request->validated();

        Libro::create([
            'Titulo' => $validated['Titulo'],
            'Autor' => $validated['Cod_Autor'],
            'Editorial' => $validated['Cod_editorial'],
            'Edicion' => $validated['Edicion'],
            'Idioma' => $validated['Idioma'],
            'Estado' => $validated['Cod_Estado'],
            'NombreCategoria' => $validated['Cod_Categoria'],
            'Descripcion' => $validated['Descripcion'],
            'CantPaginas' => $validated['CantPaginas'],
            'CopiasDisp' => $validated['CopiasDisp'],
        ]);
        
        $libro->autores()->attach($request->Autores);
        $libro->categorias()->attach($request->Categorias);
        $libro->editoriales()->attach($request->Editoriales);

        return redirect()->route('libros.index')->with('success', 'Libro agregado exitosamente');
    }

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        $editoriales = Editorial::all();
        $categorias = Categoria::all();
        $estados = Estado::all();

        return view('libros.edit', compact('libro', 'autores', 'editoriales', 'categorias', 'estados'));
    }

    public function update(LibroForRequest $request, Libro $libro)
    {
        $validated = $request->validated();

        $libro->update([
            'Titulo' => $validated['Titulo'],
            'Autor' => $validated['Cod_Autor'],
            'Editorial' => $validated['Cod_Editorial'],
            'Edicion' => $validated['Edicion'],
            'Idioma' => $validated['Idioma'],
            'Estado' => $validated['Cod_Estado'],
            'NombreCategoria' => $validated['Cod_Categoria'],
            'Numero_Ejemplar' => $validated['Numero_Ejemplar'],
            'Descripcion' => $validated['Descripcion'],
            'CantPaginas' => $validated['CantPaginas'],
            'CopiasDisp' => $validated['CopiasDisp'],
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
