@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Ejemplares</h1>
    <a href="{{ route('ejemplares.create') }}" class="btn btn-primary">Crear Ejemplar</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ejemplares as $ejemplar)
            <tr>
                <td>{{ $ejemplar->Id_Ejemplar }}</td>
                <td>{{ $ejemplar->Numero_Ejemplar }}</td>
                <td>{{ $ejemplar->Estado_Ejemplar }}</td>
                <td>
                    <a href="{{ route('ejemplares.show', $ejemplar->Id_Ejemplar) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('ejemplares.edit', $ejemplar->Id_Ejemplar) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('ejemplares.destroy', $ejemplar->Id_Ejemplar) }}" method="POST" style="display:inline-block;">
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