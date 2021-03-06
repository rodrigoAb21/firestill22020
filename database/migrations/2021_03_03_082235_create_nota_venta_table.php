<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota_venta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->boolean('tipo')->default(true);
            $table->float('total');
            $table->softDeletes();


            $table->unsignedInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado');

            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nota_venta');
    }
}
