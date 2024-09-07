@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <h1>Detalle del Autor</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $autor->Cod_Autor }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $autor->NombreAutor }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $autor->Descripcion }}</td>
        </tr>
    </table>
    <a href="{{ route('autores.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop