<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->increments('Cod_Libro');
            $table->text('Titulo');
            $table->text('Autor');
            $table->text('Editorial');
            $table->date('Edicion')->nullable();
            $table->text('Idioma');
            $table->text('Estado');
            $table->text('NombreCategoria');
            $table->text('Numero_Ejemplar');
            $table->text('Descripcion');
            $table->integer('CantPaginas')->nullable();
            $table->integer('CopiasDisp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libro');
    }
};
