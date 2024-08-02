@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Agregar Nuevo Libro</h1>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" class="form-control" id="Titulo" name="Titulo" required>
        </div>

        <div class="form-group">
            <label for="Autor">Autor</label>
            <select class="form-control" id="Autor" name="Autor" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->NombreAutor }}">{{ $autor->NombreAutor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Editorial">Editorial</label>
            <select class="form-control" id="Editorial" name="Editorial" required>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->NombreEditorial }}">{{ $editorial->NombreEditorial }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Edicion">Edición</label>
            <input type="date" class="form-control" id="Edicion" name="Edicion">
        </div>

        <div class="form-group">
            <label for="Idioma">Idioma</label>
            <input type="text" class="form-control" id="Idioma" name="Idioma" required>
        </div>

        <div class="form-group">
            <label for="NombreCategoria">Categoría</label>
            <select class="form-control" id="NombreCategoria" name="NombreCategoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->NombreCategoria }}">{{ $categoria->NombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Estado">Estado</label>
            <select class="form-control" id="Estado" name="Estado" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->Disponibilidad }}">{{ $estado->Disponibilidad }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Numero_Ejemplar">Número de Ejemplar</label>
            <input type="text" class="form-control" id="Numero_Ejemplar" name="Numero_Ejemplar" required>
        </div>

        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
        </div>

        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" class="form-control" id="CantPaginas" name="CantPaginas">
        </div>

        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" class="form-control" id="CopiasDisp" name="CopiasDisp">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop
