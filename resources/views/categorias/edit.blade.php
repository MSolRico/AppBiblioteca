@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria->Cod_Categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="NombreCategoria">Nombre de la Categoría</label>
            <input type="text" name="NombreCategoria" class="form-control" value="{{ $categoria->NombreCategoria }}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ $categoria->Descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop