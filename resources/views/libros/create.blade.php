@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Agregar Nuevo Libro</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" class="form-control" id="Titulo" name="Titulo" required>
        </div>

        <div class="form-group">
            <label for="Autores">Autores</label>
            <select class="form-control" id="Autores" name="Autores[]" multiple required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->Cod_Autor }}">{{ $autor->NombreAutor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Editoriales">Editoriales</label>
            <select class="form-control" id="Editoriales" name="Editoriales[]" multiple required>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->Cod_editorial }}">{{ $editorial->NombreEditorial }}</option>
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
            <label for="Categorias">Categorías</label>
            <select class="form-control" id="Categorias" name="Categorias[]" multiple required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->Cod_Categoria }}">{{ $categoria->NombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Estado">Estado</label>
            <select class="form-control" id="Estado" name="Estado" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->Id_Estado }}">{{ $estado->Disponibilidad }}</option>
                @endforeach
            </select>
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

