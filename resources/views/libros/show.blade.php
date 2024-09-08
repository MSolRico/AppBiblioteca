@extends('adminlte::page')

@section('title', 'Detalle del Libro')

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

        <!-- Autores -->
        <tr>
            <th>Autor(es)</th>
            <td>
                @if($libro->autores && $libro->autores->count() > 0)
                    @foreach($libro->autores as $autor)
                        {{ $autor->NombreAutor }}@if(!$loop->last), @endif
                    @endforeach
                @else
                    <em>No hay autores asociados</em>
                @endif
            </td>
        </tr>

        <!-- Editoriales -->
        <tr>
            <th>Editorial(es)</th>
            <td>
                @if($libro->editoriales && $libro->editoriales->count() > 0)
                    @foreach($libro->editoriales as $editorial)
                        {{ $editorial->NombreEditorial }}@if(!$loop->last), @endif
                    @endforeach
                @else
                    <em>No hay editoriales asociadas</em>
                @endif
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

        <!-- Estado -->
        <tr>
            <th>Estado</th>
            <td>
                @if($libro->estado)
                    {{ $libro->estado->Disponibilidad }}
                @else
                    <em>No hay estado asociado</em>
                @endif
            </td>
        </tr>

        <tr>
            <th>Descripción</th>
            <td>{{ $libro->Descripcion }}</td>
        </tr>

        <!-- Categorías -->
        <tr>
            <th>Categoría(s)</th>
            <td>
                @if($libro->categorias && $libro->categorias->count() > 0)
                    @foreach($libro->categorias as $categoria)
                        {{ $categoria->NombreCategoria }}@if(!$loop->last), @endif
                    @endforeach
                @else
                    <em>No hay categorías asociadas</em>
                @endif
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
    {{-- Añadir aquí hojas de estilos adicionales --}}
@stop

@section('js')
    {{-- Scripts adicionales --}}
@stop
