<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Alumno;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    public function index()
    {
        // Se obtienen todos los préstamos
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        // Obtener datos de alumnos y libros para los desplegables
        $alumnos = Alumno::all();
        $libros = Libro::all();

        return view('prestamos.create', compact('alumnos', 'libros'));
    }

    public function store(Request $request)
    {
        // Validación de la solicitud
        $validated = $request->validate([
            'Dni_Alumno' => 'required|exists:alumno,Dni_Alumno',
            'Cod_Libro' => 'required|exists:libro,Cod_Libro',
            'Fecha_Prestamo' => 'required|date',
            'Fecha_Devolucion' => 'nullable|date|after_or_equal:Fecha_Prestamo',
        ]);

        try {
            // Crear el préstamo
            Prestamo::create($validated);
            return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('prestamos.create')->with('error', 'Ocurrió un error al registrar el préstamo');
        }
    }

    public function show($id)
    {
        try {
            $prestamo = Prestamo::findOrFail($id);
            return view('prestamos.show', compact('prestamo'));
        } catch (\Exception $e) {
            return redirect()->route('prestamos.index')->with('error', 'No se encontró el préstamo');
        }
    }

    public function edit($id)
    {
        try {
            $prestamo = Prestamo::findOrFail($id);
            $alumnos = Alumno::all();
            $libros = Libro::all();
            return view('prestamos.edit', compact('prestamo', 'alumnos', 'libros'));
        } catch (\Exception $e) {
            return redirect()->route('prestamos.index')->with('error', 'No se pudo encontrar el préstamo para editar');
        }
    }

    public function update(Request $request, $id)
    {
        // Validación de la solicitud
        $validated = $request->validate([
            'Dni_Alumno' => 'required|exists:alumno,Dni_Alumno',
            'Cod_Libro' => 'required|exists:libro,Cod_Libro',
            'Fecha_Prestamo' => 'required|date',
            'Fecha_Devolucion' => 'nullable|date|after_or_equal:Fecha_Prestamo',
        ]);

        try {
            // Encontrar el préstamo
            $prestamo = Prestamo::findOrFail($id);
            // Actualizar el préstamo
            $prestamo->update($validated);
            return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('prestamos.edit', $id)->with('error', 'Ocurrió un error al actualizar el préstamo');
        }
    }

    public function destroy($id)
    {
        try {
            $prestamo = Prestamo::findOrFail($id);
            $prestamo->delete();
            return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente');
        } catch (\Exception $e) {
            return redirect()->route('prestamos.index')->with('error', 'No se pudo eliminar el préstamo');
        }
    }
}

