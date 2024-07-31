<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\EjemplarController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;

Route::resource('alumnos', AlumnoController::class);
Route::resource('autores', AutorController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('editoriales', EditorialController::class);
Route::resource('ejemplares', EjemplarController::class);
Route::resource('estados', EstadoController::class);
Route::resource('libros', LibroController::class);
Route::resource('prestamos', PrestamoController::class);


// Rutas para el panel de administración
Route::prefix('admin')->group(function () {
    Route::get('alumnos', [AlumnoController::class, 'index'])->name('admin.alumnos.index');
    Route::get('libros', [LibroController::class, 'index'])->name('admin.libros.index');
    Route::get('autores', [AutorController::class, 'index'])->name('admin.autores.index');
    Route::get('categorias', [CategoriaController::class, 'index'])->name('admin.categorias.index');
    Route::get('editoriales', [EditorialController::class, 'index'])->name('admin.editoriales.index');
    Route::get('prestamos', [PrestamoController::class, 'index'])->name('admin.prestamos.index');
});



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
