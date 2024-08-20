<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjemplarTable extends Migration
{
    public function up()
    {
        Schema::create('ejemplar', function (Blueprint $table) {
            $table->id('Id_Ejemplar');
            $table->unsignedBigInteger('Cod_Libro');
            $table->string('Numero_Ejemplar');
            $table->string('Estado_Ejemplar');
            $table->timestamps();

            $table->foreign('Cod_Libro')->references('Cod_Libro')->on('libro')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ejemplar');
    }
}
