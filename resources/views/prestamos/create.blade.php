@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Préstamo</h1>
@stop

@section('content')
<div class="container">
    <h1>Registrar Nuevo Préstamo</h1>

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Dni_Alumno">Alumno:</label>
            <select name="Dni_Alumno" id="Dni_Alumno" class="form-control">
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->Dni_Alumno }}">{{ $alumno->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Cod_Libro">Libro:</label>
            <select name="Cod_Libro" id="Cod_Libro" class="form-control">
                @foreach($libros as $libro)
                    <option value="{{ $libro->Cod_Libro }}">{{ $libro->Titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_Prestamo">Fecha de Préstamo:</label>
            <input type="date" name="Fecha_Prestamo" id="Fecha_Prestamo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Fecha_Devolucion">Fecha de Devolución:</label>
            <input type="date" name="Fecha_Devolucion" id="Fecha_Devolucion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop
