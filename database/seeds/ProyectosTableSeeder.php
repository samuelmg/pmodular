<?php

use Illuminate\Database\Seeder;

class ProyectosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('proyectos')->insert([
            'nombre_proyecto' => 'Inteligencia Art.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        \App\Proyecto::create([
          'nombre_proyecto' => 'Mineria de Datos'
        ]);
    }
}
