@extends('adminlte::page')

@section('title', 'CRUE Categoria')

@section('content_header')
    <h1>Panel de control Categorias</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Categorías</h1>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Crear Categoría</a>
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
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->Cod_Categoria }}</td>
                <td>{{ $categoria->NombreCategoria }}</td>
                <td>{{ $categoria->Descripcion }}</td>
                <td>
                    <a href="{{ route('categorias.show', $categoria->Cod_Categoria) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('categorias.edit', $categoria->Cod_Categoria) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('categorias.destroy', $categoria->Cod_Categoria) }}" method="POST" style="display:inline-block;">
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