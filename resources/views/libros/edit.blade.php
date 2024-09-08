@extends('adminlte::page')

@section('title', 'Editar Libro')

@section('content_header')
    <h1>Editar Libro</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Libro</h1>
    <form action="{{ route('libros.update', $libro->Cod_Libro) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" name="Titulo" class="form-control" value="{{ old('Titulo', $libro->Titulo) }}">
        </div>

        <!-- Autores -->
        <div class="form-group">
            <label for="Autores">Autor(es)</label>
            <select name="Autores[]" class="form-control" multiple>
                @foreach($autor as $autor)
                    <option value="{{ $autor->id }}" 
                        {{ in_array($autor->id, $libro->autores->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $autor->NombreAutor }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Editoriales -->
        <div class="form-group">
            <label for="Editoriales">Editorial(es)</label>
            <select name="Editoriales[]" class="form-control" multiple>
                @foreach($editorial as $editorial)
                    <option value="{{ $editorial->id }}" 
                        {{ in_array($editorial->id, $libro->editoriales->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $editorial->NombreEditorial }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Edición -->
        <div class="form-group">
            <label for="Edicion">Edición</label>
            <input type="text" name="Edicion" class="form-control" value="{{ old('Edicion', $libro->Edicion) }}">
        </div>

        <!-- Idioma -->
        <div class="form-group">
            <label for="Idioma">Idioma</label>
            <input type="text" name="Idioma" class="form-control" value="{{ old('Idioma', $libro->Idioma) }}">
        </div>

        <!-- Estado -->
        <div class="form-group">
            <label for="Estado">Estado</label>
            <select name="Id_Estado" class="form-control">
                @foreach($estado as $estado)
                    <option value="{{ $estado->id }}" {{ $libro->Id_Estado == $estado->id ? 'selected' : '' }}>
                        {{ $estado->Disponibilidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Descripción -->
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ old('Descripcion', $libro->Descripcion) }}</textarea>
        </div>

        <!-- Categorías -->
        <div class="form-group">
            <label for="Categorias">Categoría(s)</label>
            <select name="Categorias[]" class="form-control" multiple>
                @foreach($categoria as $categoria)
                    <option value="{{ $categoria->id }}" 
                        {{ in_array($categoria->id, $libro->categorias->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $categoria->NombreCategoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Cantidad de Páginas -->
        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" name="CantPaginas" class="form-control" value="{{ old('CantPaginas', $libro->CantPaginas) }}">
        </div>

        <!-- Copias Disponibles -->
        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" name="CopiasDisp" class="form-control" value="{{ old('CopiasDisp', $libro->CopiasDisp) }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop

@section('css')
    {{-- Añadir aquí hojas de estilos adicionales --}}
@stop

@section('js')
    {{-- Scripts adicionales --}}
@stop
