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

        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'CO2',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Polvo pretenzado A.B.C.',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Agua',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Polvo',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Espuma Química',
        ]);
        DB::table('tipo_clasificacion')->insert([
            'nombre' => 'Nomex',
        ]);


        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Imex',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Yukan',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Tecin',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Luda',
        ]);

        DB::table('marca_clasificacion')->insert([
            'nombre' => 'Melisan',
        ]);


    }
}
