<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('documento');
            $table->unsignedInteger('periodo');
            $table->softDeletes();


            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');

            $table->unsignedInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato');
    }
}
