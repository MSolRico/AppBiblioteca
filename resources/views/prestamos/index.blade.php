@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Panel de control Prestamos</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Préstamos</h1>
    <a href="{{ route('prestamos.create') }}" class="btn btn-primary">Crear Préstamo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>DNI Alumno</th>
                <th>Libro</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
            <tr>
                <td>{{ $prestamo->Id_prestamo }}</td>
                <td>{{ $prestamo->DNI_Alumno }}</td>
                <td>{{ $prestamo->Libro }}</td>
                <td>{{ $prestamo->Fecha_prestamo }}</td>
                <td>{{ $prestamo->Fecha_devolucion }}</td>
                <td>
                    <a href="{{ route('prestamos.show', $prestamo->Id_prestamo) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('prestamos.edit', $prestamo->Id_prestamo) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('prestamos.destroy', $prestamo->Id_prestamo) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop