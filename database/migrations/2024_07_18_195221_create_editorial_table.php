<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditorialTable extends Migration
{
    public function up()
    {
        Schema::create('editorial', function (Blueprint $table) {
            $table->id('Cod_editorial');
            $table->string('NombreEditorial');
            $table->text('Descripcion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('editorial');
    }
}
