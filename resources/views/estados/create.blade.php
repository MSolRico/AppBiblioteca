@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<div class="container">
    <h1>Crear Estado</h1>
    <form action="{{ route('estados.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Disponibilidad">Disponibilidad</label>
            <input type="text" name="Disponibilidad" class="form-control" required>
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