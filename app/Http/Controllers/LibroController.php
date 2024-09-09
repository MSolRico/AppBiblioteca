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
        
        // Sincronizar las relaciones muchos a muchos usando sync para evitar duplicados
        if ($request->has('Cod_Autor')) {
            $libro->autores()->sync($request->input('Cod_Autor'));
        }

        if ($request->has('Cod_Categoria')) {
            $libro->categorias()->sync($request->input('Cod_Categoria'));
        }

        if ($request->has('Cod_editorial')) {
            $libro->editoriales()->sync($request->input('Cod_editorial'));
        }

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
    // Asignar las propiedades del libro desde el request validado
    $validated = $request->validated();
    $libro->update($validated);

    // Asegurarse de que no haya duplicados en los inputs y sincronizar sin insertar duplicados
    if ($request->has('Cod_Autor')) {
        $autores = array_unique($request->input('Cod_Autor'));
        $libro->autores()->sync($autores);
    }

    if ($request->has('Cod_Categoria')) {
        $categorias = array_unique($request->input('Cod_Categoria'));
        $libro->categorias()->sync($categorias);
    }

    if ($request->has('Cod_editorial')) {
        $editoriales = array_unique($request->input('Cod_editorial'));
        
        // Revisar qué editoriales ya están vinculadas para evitar duplicación
        $existingEditorials = $libro->editoriales()->pluck('editorial_libro.Cod_Editorial')->toArray(); // Especifica la tabla
        
        $newEditorials = array_diff($editoriales, $existingEditorials); // Solo sincronizar las nuevas

        if (!empty($newEditorials)) {
            $libro->editoriales()->attach($newEditorials);  // Agregar solo las nuevas
        }
    }

    return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
}


    public function destroy(Libro $libro)
    {
        // Eliminar el libro y sus relaciones en las tablas pivote
        $libro->autores()->detach();
        $libro->categorias()->detach();
        $libro->editoriales()->detach();
        
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
