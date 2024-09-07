@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<div class="container">
    <h1>Editar Autor</h1>
    <form action="{{ route('autores.update', $autor->Cod_Autor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="NombreAutor">Nombre del Autor</label>
            <input type="text" name="NombreAutor" class="form-control" value="{{ $autor->NombreAutor }}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ $autor->Descripcion }}</textarea>
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
