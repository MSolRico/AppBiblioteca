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
            $table->unsignedBigInteger('Cod_Autor');
            $table->unsignedBigInteger('Cod_Categoria');
            $table->unsignedBigInteger('Cod_editorial');
            $table->unsignedBigInteger('Id_Estado');
            $table->string('Edicion');
            $table->string('Idioma');
            $table->text('Descripcion')->nullable();
            $table->integer('CantPaginas');
            $table->integer('CopiasDisp');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('Cod_Autor')->references('Cod_Autor')->on('autor')->onDelete('cascade');
            $table->foreign('Cod_Categoria')->references('Cod_Categoria')->on('categoria')->onDelete('cascade');
            $table->foreign('Cod_editorial')->references('Cod_editorial')->on('editorial')->onDelete('cascade');
            $table->foreign('Id_Estado')->references('Id_Estado')->on('estado')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('libro');
    }
}
