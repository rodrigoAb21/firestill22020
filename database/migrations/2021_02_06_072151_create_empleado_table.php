<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadoTable extends Migration
{
    /**
     *************************************************************************
     * Clase.........: CreateEmpleadoTable
     * Tipo..........: Migracion
     * Descripción...: Clase creara la tabla "empleado" en la BD.
     * Fecha.........: 06-FEB-2021
     * Autor.........: Rodrigo Abasto Berbetty
     *************************************************************************
     */


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('carnet')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('tipo')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->softDeletes();
            $table->rememberToken();
        });

        DB::table('empleado')->insert([
            'nombre' => 'nombre',
            'apellido' => 'apellido',
            'carnet' => 'carnet',
            'telefono' => '3532021',
            'direccion' => 'direccion',
            'tipo' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('rodrigo'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
