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
            <label for="Cod_Autor">Autor</label>
            <select class="form-control" id="Cod_Autor" name="Cod_Autor" required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->Cod_Autor }}">{{ $autor->NombreAutor }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cod_Editorial">Editorial</label>
            <select class="form-control" id="Cod_Editorial" name="Cod_Editorial" required>
                @foreach($editoriales as $editorial)
                    <option value="{{ $editorial->Cod_Editorial }}">{{ $editorial->NombreEditorial }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cod_Categoria">Categoría</label>
            <select class="form-control" id="Cod_Categoria" name="Cod_Categoria" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->Cod_Categoria }}">{{ $categoria->NombreCategoria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cod_Estado">Estado</label>
            <select class="form-control" id="Cod_Estado" name="Cod_Estado" required>
                @foreach($estados as $estado)
                    <option value="{{ $estado->Id_Estado }}">{{ $estado->NombreEstado }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Numero_Ejemplar">Número de Ejemplar</label>
            <input type="number" class="form-control" id="Numero_Ejemplar" name="Numero_Ejemplar" required>
        </div>

        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
        </div>

        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" class="form-control" id="CantPaginas" name="CantPaginas" required>
        </div>

        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" class="form-control" id="CopiasDisp" name="CopiasDisp" required>
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
