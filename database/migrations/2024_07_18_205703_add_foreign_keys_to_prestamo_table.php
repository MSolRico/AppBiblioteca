<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPrestamoTable extends Migration
{
    public function up()
    {
        Schema::table('prestamo', function (Blueprint $table) {
            // Añadir la columna para la clave foránea
            $table->unsignedBigInteger('Dni_Alumno');
            $table->unsignedBigInteger('Cod_Libro');

            // Definir las claves foráneas
            $table->foreign('Dni_Alumno')->references('Dni_Alumno')->on('alumno')->onDelete('cascade');
            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('prestamo', function (Blueprint $table) {
            // Eliminar las claves foráneas
            $table->dropForeign(['Dni_Alumno']);
            $table->dropForeign(['Cod_Libro']);
            
            // Eliminar las columnas
            $table->dropColumn(['Dni_Alumno', 'Cod_Libro']);
        });
    }
}
