<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->integer('ano_fabricacion');
            $table->float('capacodad');
            $table->float('presion_min');
            $table->float('presion_max');
            $table->double('longitud');
            $table->double('latitud');
            $table->softDeletes();


            $table->unsignedInteger('sucursal_id');
            $table->foreign('sucursal_id')->references('id')->on('sucursal');

            $table->unsignedInteger('tipo_clasificacion_id');
            $table->foreign('tipo_clasificacion_id')->references('id')->on('tipo_clasificacion');

            $table->unsignedInteger('marca_clasificacion_id');
            $table->foreign('marca_clasificacion_id')->references('id')->on('marca_clasificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipo');
    }
}
