<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->float('presion');
            $table->double('longitud');
            $table->double('latitud');
            $table->softDeletes();

            $table->unsignedInteger('equipo_id');
            $table->foreign('equipo_id')->references('id')->on('equipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado_equipo');
    }
}
