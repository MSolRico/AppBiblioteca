<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorialLibroTable extends Migration
{
    public function up()
    {
        Schema::create('editorial_libro', function (Blueprint $table) {
            $table->unsignedBigInteger('Cod_Libro');
            $table->unsignedBigInteger('Cod_Editorial');

            // Foreign Keys
            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
            $table->foreign('Cod_Editorial')->references('Cod_editorial')->on('editorial')->onDelete('cascade');

            // Unique constraint to avoid duplicate pairs
            $table->unique(['Cod_Libro', 'Cod_Editorial']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('editorial_libro');
    }
}
