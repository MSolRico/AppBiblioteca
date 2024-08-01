@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Editoriales</h1>
    <a href="{{ route('editoriales.create') }}" class="btn btn-primary">Crear Editorial</a>
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
            @foreach($editoriales as $editorial)
            <tr>
                <td>{{ $editorial->Cod_editorial }}</td>
                <td>{{ $editorial->NombreEditorial }}</td>
                <td>{{ $editorial->Descripcion }}</td>
                <td>
                    <a href="{{ route('editoriales.show', $editorial->Cod_editorial) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('editoriales.edit', $editorial->Cod_editorial) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('editoriales.destroy', $editorial->Cod_editorial) }}" method="POST" style="display:inline-block;">
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