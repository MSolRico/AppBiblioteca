@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 
@stop

@section('content')
<div class="container">
    <h1>Editar Ejemplar</h1>
    <form action="{{ route('ejemplares.update', $ejemplar->Id_Ejemplar) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Numero_Ejemplar">Número del Ejemplar</label>
            <input type="text" name="Numero_Ejemplar" class="form-control" value="{{ $ejemplar->Numero_Ejemplar }}">
        </div>
        <div class="form-group">
            <label for="Estado_Ejemplar">Estado del Ejemplar</label>
            <input type="text" name="Estado_Ejemplar" class="form-control" value="{{ $ejemplar->Estado_Ejemplar }}">
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