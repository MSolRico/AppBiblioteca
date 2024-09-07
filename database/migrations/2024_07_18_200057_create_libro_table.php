<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->id('Cod_Libro');
            $table->string('Titulo');
            $table->string('Edicion');
            $table->string('Idioma');
            $table->text('Descripcion')->nullable();
            $table->integer('CantPaginas');
            $table->integer('CopiasDisp');

            // Clave foránea para Estado
            $table->unsignedBigInteger('Id_Estado'); // campo que relaciona con Estado

            // Definir la relación con la tabla Estado
            $table->foreign('Id_Estado')->references('Id_Estado')->on('estado')->onDelete('cascade');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
