@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
 
@stop

@section('content')
<div class="container">
    <h1>Editar Estado</h1>
    <form action="{{ route('estados.update', $estado->Id_Estado) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Disponibilidad">Disponibilidad</label>
            <input type="text" name="Disponibilidad" class="form-control" value="{{ $estado->Disponibilidad }}" required>
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