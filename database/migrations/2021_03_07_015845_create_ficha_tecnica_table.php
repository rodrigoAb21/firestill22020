<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaTecnicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tecnica', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('eCanioPesca');
            $table->string('eZuncho');
            $table->string('eChasis');
            $table->string('eRueda');
            $table->string('eRosca');
            $table->string('eManguera');
            $table->string('eValvula');
            $table->string('eTobera');
            $table->string('eRobinete');
            $table->string('ePalanca');
            $table->string('eManometro');
            $table->string('eVastago');
            $table->string('eDifusor');
            $table->string('eDisco');
            $table->float('carga');
            $table->text('observacion');
            $table->string('resultado');
            $table->softDeletes();

            $table->unsignedInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleado');

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
        Schema::dropIfExists('ficha_tecnica');
    }
}
