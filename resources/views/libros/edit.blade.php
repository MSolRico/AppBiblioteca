@extends('adminlte::page')

@section('title', 'Editar Libro')

@section('content_header')
    <h1>Editar Libro</h1>
@stop

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <form action="{{ route('libros.update', $libro->Cod_Libro) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Título -->
        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" class="form-control" id="Titulo" name="Titulo" value="{{ old('Titulo', $libro->Titulo) }}" required>
        </div>

        <!-- Autores -->
        <div class="form-group">
            <label for="Cod_Autor">Autor</label>
            <select class="form-control" id="Cod_Autor" name="Cod_Autor[]" multiple required>
                @foreach($autor as $autor)
                    <option value="{{ $autor->Cod_Autor }}" {{ in_array($autor->Cod_Autor, old('Cod_Autor', $libro->autores->pluck('Cod_Autor')->toArray())) ? 'selected' : '' }}>
                        {{ $autor->NombreAutor }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Editoriales -->
        <div class="form-group">
            <label for="Cod_editorial">Editorial</label>
            <select class="form-control" id="Cod_editorial" name="Cod_editorial[]" multiple required>
                @foreach($editorial as $editorial)
                    <option value="{{ $editorial->Cod_editorial }}" {{ in_array($editorial->Cod_editorial, old('Cod_editorial', $libro->editoriales->pluck('Cod_editorial')->toArray())) ? 'selected' : '' }}>
                        {{ $editorial->NombreEditorial }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Categorías -->
        <div class="form-group">
            <label for="Cod_Categoria">Categoría</label>
            <select class="form-control" id="Cod_Categoria" name="Cod_Categoria[]" multiple required>
                @foreach($categoria as $categoria)
                    <option value="{{ $categoria->Cod_Categoria }}" {{ in_array($categoria->Cod_Categoria, old('Cod_Categoria', $libro->categorias->pluck('Cod_Categoria')->toArray())) ? 'selected' : '' }}>
                        {{ $categoria->NombreCategoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Edición -->
        <div class="form-group">
            <label for="Edicion">Edición</label>
            <input type="date" class="form-control" id="Edicion" name="Edicion" value="{{ old('Edicion', $libro->Edicion) }}" required>
        </div>

        <!-- Idioma -->
        <div class="form-group">
            <label for="Idioma">Idioma</label>
            <input type="text" class="form-control" id="Idioma" name="Idioma" value="{{ old('Idioma', $libro->Idioma) }}" required>
        </div>

        <!-- Estado -->
        <div class="form-group">
            <label for="Id_Estado">Estado</label>
            <select class="form-control" id="Id_Estado" name="Id_Estado" required>
                @foreach($estado as $estado)
                    <option value="{{ $estado->Id_Estado }}" {{ old('Id_Estado', $libro->Id_Estado) == $estado->Id_Estado ? 'selected' : '' }}>
                        {{ $estado->Disponibilidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Descripción -->
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion">{{ old('Descripcion', $libro->Descripcion) }}</textarea>
        </div>

        <!-- Cantidad de Páginas -->
        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" class="form-control" id="CantPaginas" name="CantPaginas" value="{{ old('CantPaginas', $libro->CantPaginas) }}">
        </div>

        <!-- Copias Disponibles -->
        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" class="form-control" id="CopiasDisp" name="CopiasDisp" value="{{ old('CopiasDisp', $libro->CopiasDisp) }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop

@section('css')
    {{-- Añadir aquí hojas de estilos adicionales --}}
@stop

@section('js')
    {{-- Añadir aquí scripts adicionales --}}
@stop
