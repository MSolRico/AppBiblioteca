@extends('adminlte::page')

@section('title', 'CRUD Alumno')

@section('content_header')
    <h1>Panel de control Alumnos</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Crear Alumno</a>
    <table class="table">
        <thead>
            <tr>
                <th>Dni</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->Dni_Alumno }}</td>
                <td>{{ $alumno->User }}</td>
                <td>{{ $alumno->Email }}</td>
                <td>
                    <a href="{{ route('alumnos.show', $alumno->Dni_Alumno) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('alumnos.edit', $alumno->Dni_Alumno) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('alumnos.destroy', $alumno->Dni_Alumno) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop