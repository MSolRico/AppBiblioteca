@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle del Libro</h1>
@stop

@section('content')
<div class="container">
    <h1>Detalle del Libro</h1>
    
    @if($libro)
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $libro->Cod_Libro }}</td>
        </tr>
        <tr>
            <th>Título</th>
            <td>{{ $libro->Titulo }}</td>
        </tr>
        <tr>
            <th>Autor</th>
            <td>
                @foreach($libro->autor as $autor)
                    {{ $autor->NombreAutor }}@if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Editorial</th>
            <td>
                @foreach($libro->editorial as $editorial)
                    {{ $editorial->NombreEditorial }}@if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Edición</th>
            <td>{{ $libro->Edicion }}</td>
        </tr>
        <tr>
            <th>Idioma</th>
            <td>{{ $libro->Idioma }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $libro->estado->Disponibilidad }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $libro->Descripcion }}</td>
        </tr>
        <tr>
            <th>Categoría</th>
            <td>
                @foreach($libro->categoria as $categoria)
                    {{ $categoria->NombreCategoria }}@if(!$loop->last), @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>Cantidad de Páginas</th>
            <td>{{ $libro->CantPaginas }}</td>
        </tr>
        <tr>
            <th>Copias Disponibles</th>
            <td>{{ $libro->CopiasDisp }}</td>
        </tr>
    </table>
    @else
        <p>No se encontró el libro.</p>
    @endif

    <a href="{{ route('libros.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop
