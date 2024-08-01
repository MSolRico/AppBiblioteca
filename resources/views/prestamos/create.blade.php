@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Crear Préstamo</h1>
    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="DNI_Alumno">DNI del Alumno</label>
            <input type="text" name="DNI_Alumno" class="form-control">
        </div>
        <div class="form-group">
            <label for="Libro">Libro</label>
            <select name="Libro" class="form-control">
                @foreach($libros as $libro)
                <option value="{{ $libro->Cod_Libro }}">{{ $libro->Titulo }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Fecha_prestamo">Fecha de Préstamo</label>
            <input type="date" name="Fecha_prestamo" class="form-control">
        </div>
        <div class="form-group">
            <label for="Fecha_devolucion">Fecha de Devolución</label>
            <input type="date" name="Fecha_devolucion" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop
