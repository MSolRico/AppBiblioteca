@extends('adminlte::page')

@section('title', 'CRUD Libros')

@section('content_header')
    <h1>Panel de control Libros</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Libros</h1>
    <a href="{{ route('libros.create') }}" class="btn btn-primary">Crear Libro</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edición</th>
                <th>Idioma</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->Cod_Libro }}</td>
                <td>{{ $libro->Titulo }}</td>
                <td>{{ $libro->Autor }}</td>
                <td>{{ $libro->Editorial }}</td>
                <td>{{ $libro->Edicion }}</td>
                <td>{{ $libro->Idioma }}</td>
                <td>{{ $libro->Estado }}</td>
                <td>
                    <a href="{{ route('libros.show', $libro->Cod_Libro) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('libros.edit', $libro->Cod_Libro) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('libros.destroy', $libro->Cod_Libro) }}" method="POST" style="display:inline-block;">
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

