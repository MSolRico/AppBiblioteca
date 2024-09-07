@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <h1>Editar Alumno</h1>
    <form action="{{ route('alumnos.update', $alumno->Dni_Alumno) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Dni_Alumno">DNI</label>
            <input type="text" name="Dni_Alumno" class="form-control" value="{{ $alumno->Dni_Alumno }}">
        </div>
        <div class="form-group">
            <label for="User">Usuario</label>
            <input type="text" name="User" class="form-control" value="{{ $alumno->User }}">
        </div>
        <div class="form-group">
            <label for="Password">Contraseña</label>
            <input type="password" name="Password" class="form-control">
        </div>
        <div class="form-group">
            <label for="Direccion">Dirección</label>
            <input type="text" name="Direccion" class="form-control" value="{{ $alumno->Direccion }}">
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono</label>
            <input type="text" name="Telefono" class="form-control" value="{{ $alumno->Telefono }}">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="text" name="Email" class="form-control" value="{{ $alumno->Email }}">
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