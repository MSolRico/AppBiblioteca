@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Préstamo</h1>

    <form action="{{ route('prestamos.update', $prestamo->Cod_Prestamo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Dni_Alumno">Alumno:</label>
            <select name="Dni_Alumno" id="Dni_Alumno" class="form-control">
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->Dni_Alumno }}" {{ $prestamo->Dni_Alumno == $alumno->Dni_Alumno ? 'selected' : '' }}>
                        {{ $alumno->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Cod_Libro">Libro:</label>
            <select name="Cod_Libro" id="Cod_Libro" class="form-control">
                @foreach($libros as $libro)
                    <option value="{{ $libro->Cod_Libro }}" {{ $prestamo->Cod_Libro == $libro->Cod_Libro ? 'selected' : '' }}>
                        {{ $libro->Titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_Prestamo">Fecha de Préstamo:</label>
            <input type="date" name="Fecha_Prestamo" id="Fecha_Prestamo" class="form-control" value="{{ $prestamo->Fecha_Prestamo }}" required>
        </div>
        <div class="form-group">
            <label for="Fecha_Devolucion">Fecha de Devolución:</label>
            <input type="date" name="Fecha_Devolucion" id="Fecha_Devolucion" class="form-control" value="{{ $prestamo->Fecha_Devolucion }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Préstamo</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop