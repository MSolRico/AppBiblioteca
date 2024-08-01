@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Préstamo</h1>
    <form action="{{ route('prestamos.update', $prestamo->Id_prestamo) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="DNI_Alumno">DNI del Alumno</label>
            <input type="text" name="DNI_Alumno" class="form-control" value="{{ $prestamo->DNI_Alumno }}">
        </div>
        <div class="form-group">
            <label for="Libro">Libro</label>
            <select name="Libro" class="form-control">
                @foreach($libros as $libro)
                <option value="{{ $libro->Cod_Libro }}" {{ $prestamo->Libro == $libro->Cod_Libro ? 'selected' : '' }}>{{ $libro->Titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_prestamo">Fecha de Préstamo</label>
            <input type="date" name="Fecha_prestamo" class="form-control" value="{{ $prestamo->Fecha_prestamo }}">
        </div>
        <div class="form-group">
            <label for="Fecha_devolucion">Fecha de Devolución</label>
            <input type="date" name="Fecha_devolucion" class="form-control" value="{{ $prestamo->Fecha_devolucion }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop