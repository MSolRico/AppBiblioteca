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
            $table->date('Fecha_Prestamo');
            $table->date('Fecha_Devolucion')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamo');
    }
}
