@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Editar Libro</h1>
    <form action="{{ route('libros.update', $libro->Cod_Libro) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Titulo">Título</label>
            <input type="text" name="Titulo" class="form-control" value="{{ $libro->Titulo }}">
        </div>
        <div class="form-group">
            <label for="Autor">Autor</label>
            <input type="text" name="Autor" class="form-control" value="{{ $libro->Autor }}">
        </div>
        <div class="form-group">
            <label for="Editorial">Editorial</label>
            <input type="text" name="Editorial" class="form-control" value="{{ $libro->Editorial }}">
        </div>
        <div class="form-group">
            <label for="Edicion">Edición</label>
            <input type="date" name="Edicion" class="form-control" value="{{ $libro->Edicion }}">
        </div>
        <div class="form-group">
            <label for="Idioma">Idioma</label>
            <input type="text" name="Idioma" class="form-control" value="{{ $libro->Idioma }}">
        </div>
        <div class="form-group">
            <label for="Estado">Estado</label>
            <input type="text" name="Estado" class="form-control" value="{{ $libro->Estado }}">
        </div>
        <div class="form-group">
            <label for="Categoria">Categoria</label>
            <input type="text" name="Categoria" class="form-control" value="{{ $libro->Categoria }}">
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" class="form-control">{{ $libro->Descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="CantPaginas">Cantidad de Páginas</label>
            <input type="number" name="CantPaginas" class="form-control" value="{{ $libro->CantPaginas }}">
        </div>
        <div class="form-group">
            <label for="CopiasDisp">Copias Disponibles</label>
            <input type="number" name="CopiasDisp" class="form-control" value="{{ $libro->CopiasDisp }}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@stop
@extends('layouts.app')

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop
