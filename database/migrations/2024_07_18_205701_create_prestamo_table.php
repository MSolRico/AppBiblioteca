<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestamoTable extends Migration
{
    public function up()
    {
        Schema::create('prestamo', function (Blueprint $table) {
            $table->id('Cod_Prestamo');
            $table->unsignedBigInteger('Dni_Alumno');
            $table->unsignedBigInteger('Cod_Libro');
            $table->unsignedBigInteger('Cod_Ejemplar');
            $table->date('Fecha_Prestamo');
            $table->date('Fecha_Devolucion')->nullable();
            $table->timestamps();

            $table->foreign('Dni_Alumno')->references('Dni_Alumno')->on('alumno')->onDelete('cascade');
            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
            $table->foreign('Cod_Ejemplar')->references('Id_Ejemplar')->on('ejemplar')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamo');
    }
}
