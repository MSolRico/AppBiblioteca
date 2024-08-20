<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoTable extends Migration
{
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->id('Id_Estado');
            $table->string('Disponibilidad');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estado');
    }
}

