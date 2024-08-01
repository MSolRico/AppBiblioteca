@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Detalle del Préstamo</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $prestamo->Id_prestamo }}</td>
        </tr>
        <tr>
            <th>DNI Alumno</th>
            <td>{{ $prestamo->DNI_Alumno }}</td>
        </tr>
        <tr>
            <th>Libro</th>
            <td>{{ $prestamo->Libro }}</td>
        </tr>
        <tr>
            <th>Fecha de Préstamo</th>
            <td>{{ $prestamo->Fecha_prestamo }}</td>
        </tr>
        <tr>
            <th>Fecha de Devolución</th>
            <td>{{ $prestamo->Fecha_devolucion }}</td>
        </tr>
    </table>
    <a href="{{ route('prestamos.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop