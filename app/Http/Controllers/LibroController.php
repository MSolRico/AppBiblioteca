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
        $autor = Autor::all();
        $editorial = Editorial::all();
        $categoria = Categoria::all();
        $estado = Estado::all();

        return view('libros.create', compact('autor', 'editorial', 'categoria', 'estado'));
    }

    public function store(LibroForRequest $request)
{
    $validated = $request->validated();

    // Crear una nueva instancia del modelo Libro
    $libro = new Libro();
    $libro->Titulo = $validated['Titulo'];
    $libro->Edicion = $validated['Edicion'];
    $libro->Idioma = $validated['Idioma'];
    $libro->Descripcion = $validated['Descripcion'];
    $libro->CantPaginas = $validated['CantPaginas'];
    $libro->CopiasDisp = $validated['CopiasDisp'];
    $libro->Id_Estado = $validated['Id_Estado'];
    $libro->save();

    // Asignar las relaciones de muchos a muchos
    if ($request->has('Cod_Autor')) {
        $libro->autor()->attach($request->Cod_Autor);
    }

    if ($request->has('Categoria')) {
        $libro->categoria()->attach($request->Categoria);
    }

    if ($request->has('Editorial')) {
        $libro->editorial()->attach($request->Editorial);
    }

    return redirect()->route('libros.index')->with('success', 'Libro agregado exitosamente');
}


    

    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    public function edit(Libro $libro)
    {
        $autor = Autor::all();
        $editorial = Editorial::all();
        $categoria = Categoria::all();
        $estado = Estado::all();

        return view('libros.edit', compact('libro', 'autor', 'editorial', 'categoria', 'estado'));
    }

    public function update(LibroForRequest $request, Libro $libro)
{
    // Asignar las propiedades del libro desde el request
    $libro->Titulo = $request->Titulo;
    $libro->Edicion = $request->Edicion;
    $libro->Idioma = $request->Idioma;
    $libro->Descripcion = $request->Descripcion;
    $libro->CantPaginas = $request->CantPaginas;
    $libro->CopiasDisp = $request->CopiasDisp;
    $libro->Id_Estado = $request->Id_Estado;
    $libro->save();

    // Actualizar las relaciones de muchos a muchos
    if ($request->has('Cod_Autor')) {
        $libro->autor()->sync($request->Cod_Autor);
    }

    if ($request->has('Categoria')) {
        $libro->categoria()->sync($request->Categoria);
    }

    if ($request->has('Editorial')) {
        $libro->editorial()->sync($request->Editorial);
    }

    return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
}

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
