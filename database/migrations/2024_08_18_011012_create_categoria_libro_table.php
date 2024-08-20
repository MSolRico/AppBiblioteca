<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaLibroTable extends Migration
{
    public function up()
    {
        Schema::create('categoria_libro', function (Blueprint $table) {
            $table->unsignedBigInteger('Cod_Libro');
            $table->unsignedBigInteger('Cod_Categoria');

            // Foreign Keys
            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
            $table->foreign('Cod_Categoria')->references('Cod_Categoria')->on('categoria')->onDelete('cascade');

            // Unique constraint to avoid duplicate pairs
            $table->unique(['Cod_Libro', 'Cod_Categoria']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria_libro');
    }
}
