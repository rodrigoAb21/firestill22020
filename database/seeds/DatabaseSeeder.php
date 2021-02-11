<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Modelos\Cliente::class,10)->create();
        factory(\App\Modelos\Empleado::class,4)->create();
    }
}
