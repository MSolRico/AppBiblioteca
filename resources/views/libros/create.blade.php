@extends('adminlte::page')

@section('title', 'Agregar Nuevo Libro')

@section('content_header')
    <h1>Agregar Nuevo Libro</h1>
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
    <form action="{{ route('libros.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" class="form-control" id="Titulo" name="Titulo" value="{{ old('Titulo') }}" required>
        </div>

        <div class="form-group">
            <label for="Cod_Autor">Autor</label>
            <select class="form-control" id="Cod_Autor" name="Cod_Autor[]" multiple required>
                @foreach($autor as $autor)
                    <option value="{{ $autor->Cod_Autor }}" {{ in_array($autor->Cod_Autor, old('Cod_Autor', [])) ? 'selected' : '' }}>
                        {{ $autor->NombreAutor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cod_editorial">Editorial</label>
            <select class="form-control" id="Cod_editorial" name="Cod_editorial[]" multiple required>
                @foreach($editorial as $editorial)
                    <option value="{{ $editorial->Cod_editorial }}" {{ in_array($editorial->Cod_editorial, old('Cod_editorial', [])) ? 'selected' : '' }}>
                        {{ $editorial->NombreEditorial }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Cod_Categoria">Categoría</label>
            <select class="form-control" id="Cod_Categoria" name="Cod_Categoria[]" multiple required>
                @foreach($categoria as $categoria)
                    <option value="{{ $categoria->Cod_Categoria }}" {{ in_array($categoria->Cod_Categoria, old('Cod_Categoria', [])) ? 'selected' : '' }}>
                        {{ $categoria->NombreCategoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Edicion">Edición</label>
            <input type="date" class="form-control" id="Edicion" name="Edicion" value="{{ old('Edicion') }}" required>
        </div>

        <div class="form-group">
            <label for="Idioma">Idioma</label>
            <input type="text" class="form-control" id="Idioma" name="Idioma" value="{{ old('Idioma') }}" required>
        </div>

        <div class="form-group">
            <label for="Id_Estado">Estado</label>
            <select class="form-control" id="Id_Estado" name="Id_Estado" required>
                @foreach($estado as $estado)
                    <option value="{{ $estado->Id_Estado }}" {{ old('Id_Estado') == $estado->Id_Estado ? 'selected' : '' }}>
                        {{ $estado->Disponibilidad }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion">{{ old('Descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" class="form-control" id="CantPaginas" name="CantPaginas" value="{{ old('CantPaginas') }}">
        </div>

        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" class="form-control" id="CopiasDisp" name="CopiasDisp" value="{{ old('CopiasDisp') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
@stop

