@extends('adminlte::page')

@section('title', 'Vista Préstamo')

@section('content_header')
    <h1>Vista Préstamo</h1>
@stop

@section('content')
<div class="container">
    <h1>Detalle del Préstamo</h1>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $prestamo->Cod_Prestamo }}</td>
        </tr>
        <tr>
            <th>Alumno</th>
            <td>{{ $prestamo->alumno->User ?? 'No disponible' }}</td>
        </tr>
        <tr>
            <th>Libro</th>
            <td>{{ $prestamo->libro->Titulo ?? 'No disponible' }}</td>
        </tr>
        <tr>
            <th>Fecha de Préstamo</th>
            <td>{{ $prestamo->Fecha_Prestamo }}</td>
        </tr>
        <tr>
            <th>Fecha de Devolución</th>
            <td>{{ $prestamo->Fecha_Devolucion ?? 'No registrada' }}</td>
        </tr>
    </table>
    <a href="{{ route('prestamos.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Estilos personalizados opcionales --}}
@stop

@section('js')
    {{-- Scripts personalizados opcionales --}}
@stop
