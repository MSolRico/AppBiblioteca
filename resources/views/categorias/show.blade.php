@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <h1>Detalle de la Categoría</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $categoria->Cod_Categoria }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $categoria->NombreCategoria }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $categoria->Descripcion }}</td>
        </tr>
    </table>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop