@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Detalle del Ejemplar</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $ejemplar->Id_Ejemplar }}</td>
        </tr>
        <tr>
            <th>Número</th>
            <td>{{ $ejemplar->Numero_Ejemplar }}</td>
        </tr>
        <tr>
            <th>Estado</th>
            <td>{{ $ejemplar->Estado_Ejemplar }}</td>
        </tr>
    </table>
    <a href="{{ route('ejemplares.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop