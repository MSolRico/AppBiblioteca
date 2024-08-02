<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Alumno;
use App\Models\Libro;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        // Obtener datos para los desplegables
        $alumnos = Alumno::all();
        $libros = Libro::all();

        return view('prestamos.create', compact('alumnos', 'libros'));
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'Dni_Alumno' => 'required|exists:alumno,Dni_Alumno',
            'Cod_Libro' => 'required|exists:libro,Cod_Libro',
            'Fecha_Prestamo' => 'required|date',
            'Fecha_Devolucion' => 'nullable|date|after_or_equal:Fecha_Prestamo',
        ]);

        // Crear el préstamo
        Prestamo::create($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
    }

    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
    }

    public function edit($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        // Obtener datos para los desplegables
        $alumnos = Alumno::all();
        $libros = Libro::all();

        return view('prestamos.edit', compact('prestamo', 'alumnos', 'libros'));
    }

    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'Dni_Alumno' => 'required|exists:alumno,Dni_Alumno',
            'Cod_Libro' => 'required|exists:libro,Cod_Libro',
            'Fecha_Prestamo' => 'required|date',
            'Fecha_Devolucion' => 'nullable|date|after_or_equal:Fecha_Prestamo',
        ]);

        // Encontrar el préstamo
        $prestamo = Prestamo::findOrFail($id);

        // Actualizar el préstamo
        $prestamo->update($validated);

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente');
    }
}
