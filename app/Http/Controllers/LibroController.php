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
        // Usar relaciones correctamente
        $libros = Libro::with('autores', 'editoriales', 'categorias', 'estado')->get();
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
        // Validar los datos del formulario
        $validated = $request->validated();

        // Crear una nueva instancia del modelo Libro y asignar los valores validados
        $libro = new Libro();
        $libro->Titulo = $validated['Titulo'];
        $libro->Edicion = $validated['Edicion'];
        $libro->Idioma = $validated['Idioma'];
        $libro->Descripcion = $validated['Descripcion'];
        $libro->CantPaginas = $validated['CantPaginas'];
        $libro->CopiasDisp = $validated['CopiasDisp'];
        $libro->Id_Estado = $validated['Id_Estado'];
        
        // Guardar el libro en la base de datos
        $libro->save();
        
        // Sincronizar las relaciones muchos a muchos
        $libro->autores()->sync($request->Cod_Autor);
        $libro->categorias()->sync($request->Cod_Categoria);
        $libro->editoriales()->sync($request->Cod_editorial);

        // Redirigir al índice de libros con un mensaje de éxito
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
            $libro->autores()->sync($request->Cod_Autor);
        }

        if ($request->has('Cod_Categoria')) {
            $libro->categorias()->sync($request->Cod_Categoria);
        }

        if ($request->has('Cod_editorial')) {
            $libro->editoriales()->sync($request->Cod_editorial);
        }

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}


