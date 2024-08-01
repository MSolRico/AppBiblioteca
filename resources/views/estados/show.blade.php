@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
    <h1>Detalle del Estado</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $estado->Id_Estado }}</td>
        </tr>
        <tr>
            <th>Disponibilidad</th>
            <td>{{ $estado->Disponibilidad }}</td>
        </tr>
    </table>
    <a href="{{ route('estados.index') }}" class="btn btn-primary">Volver a la lista</a>
</div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop