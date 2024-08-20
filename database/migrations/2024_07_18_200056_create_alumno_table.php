<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnoTable extends Migration
{
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->id('Dni_Alumno');
            $table->string('User');
            $table->string('Password');
            $table->string('Direccion')->nullable();
            $table->string('Telefono')->nullable();
            $table->string('Email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alumno');
    }
}
