@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Préstamo</h1>
@stop

@section('content')
<div class="container">
    <h1>Registrar Nuevo Préstamo</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mostrar mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Mostrar mensaje de error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('prestamos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Dni_Alumno">Alumno:</label>
            <select name="Dni_Alumno" id="Dni_Alumno" class="form-control" required>
                <option value="" disabled selected>Seleccione un Alumno</option>
                @foreach($alumnos as $alumno)
                    <option value="{{ $alumno->Dni_Alumno }}" {{ old('Dni_Alumno') == $alumno->Dni_Alumno ? 'selected' : '' }}>
			{{ $alumno->User }}
		</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="Cod_Libro">Libro:</label>
            <select name="Cod_Libro" id="Cod_Libro" class="form-control">
                <option value="" disabled selected>Seleccione un libro</option>
                @foreach($libros as $libro)
                    <option value="{{ $libro->Cod_Libro }}" {{ old('Cod_Libro') == $libro->Cod_Libro ? 'selected' : '' }}>
                        {{ $libro->Titulo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Fecha_Prestamo">Fecha de Préstamo:</label>
            <input type="date" name="Fecha_Prestamo" id="Fecha_Prestamo" class="form-control" value="{{ old('Fecha_Prestamo') }}" required>
        </div>

        <div class="form-group">
            <label for="Fecha_Devolucion">Fecha de Devolución:</label>
            <input type="date" name="Fecha_Devolucion" id="Fecha_Devolucion" class="form-control" value="{{ old('Fecha_Devolucion') }}">
        </div>

        <button type="submit" class="btn btn-primary">Registrar Préstamo</button>
    </form>
</div>
@stop

@section('css')
    {{-- Añadir estilos personalizados si es necesario --}}
@stop

@section('js')
    {{-- Añadir scripts personalizados si es necesario --}}
@stop
