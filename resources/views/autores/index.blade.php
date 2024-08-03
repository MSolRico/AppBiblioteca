@extends('adminlte::page')

@section('title', 'CRUD Autores')

@section('content_header')
    <h1>Panel de control Autores</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Autores</h1>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">Crear Autor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
            <tr>
                <td>{{ $autor->Cod_Autor }}</td>
                <td>{{ $autor->NombreAutor }}</td>
                <td>{{ $autor->Descripcion }}</td>
                <td>
                    <a href="{{ route('autores.show', $autor->Cod_Autor) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('autores.edit', $autor->Cod_Autor) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('autores.destroy', $autor->Cod_Autor) }}" method="POST" style="display:inline-block;">
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
