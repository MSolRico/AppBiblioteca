@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Lista de Estados</h1>
    <a href="{{ route('estados.create') }}" class="btn btn-primary">Crear Estado</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Disponibilidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->Id_Estado }}</td>
                <td>{{ $estado->Disponibilidad }}</td>
                <td>
                    <a href="{{ route('estados.show', $estado->Id_Estado) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('estados.edit', $estado->Id_Estado) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('estados.destroy', $estado->Id_Estado) }}" method="POST" style="display:inline-block;">
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