<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorLibroTable extends Migration
{
    public function up()
    {
        Schema::create('autor_libro', function (Blueprint $table) {
            $table->unsignedBigInteger('Cod_Libro');
            $table->unsignedBigInteger('Cod_Autor');

            // Foreign Keys
            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
            $table->foreign('Cod_Autor')->references('Cod_Autor')->on('autor')->onDelete('cascade');

            // Unique constraint to avoid duplicate pairs
            $table->unique(['Cod_Libro', 'Cod_Autor']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('autor_libro');
    }
}

