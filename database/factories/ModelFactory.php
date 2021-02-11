<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(\App\Modelos\Empleado::class, function (Faker\Generator $faker){
    return [
        'nombre' => $faker->name,
        'apellido' => $faker->lastName,
        'carnet' => $faker -> numberBetween('8000000', '12000000'),
        'telefono' =>  $faker -> numberBetween(73194476,79999999),
        'direccion' => $faker -> address,
        'tipo' => 'Administrador',
        'email' => $faker->email,
        'password' => bcrypt('rodrigo'),
    ];
});

$factory->define(\App\Modelos\Cliente::class, function (Faker\Generator $faker){
    return [
        'nombre_empresa' => $faker->company,
        'nit' =>  $faker->numberBetween('10000000', '1200000000'),
        'email' => $faker->companyEmail,
        'telefono_empresa' => $faker->phoneNumber,
        'direccion' => $faker->address,
        'nombre_encargado' => $faker->name.' '. $faker->lastName,
        'cargo_encargado' => 'Encargado de Seguridad',
        'telefono_encargado' => $faker->phoneNumber,
    ];
});