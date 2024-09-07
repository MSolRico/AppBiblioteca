@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

@stop

@section('content')
<div class="container">
    <h1>Crear Alumno</h1>
    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Dni_Alumno">DNI</label>
            <input type="text" name="Dni_Alumno" class="form-control">
        </div>
        <div class="form-group">
            <label for="User">Usuario</label>
            <input type="text" name="User" class="form-control">
        </div>
        <div class="form-group">
            <label for="Password">Contraseña</label>
            <input type="password" name="Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" name="Direccion" class="form-control">
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="text" name="Telefono" class="form-control">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="Email" class="form-control">
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