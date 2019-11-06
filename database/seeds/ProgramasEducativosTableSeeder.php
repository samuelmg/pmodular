<?php

use Illuminate\Database\Seeder;

class ProgramasEducativosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\ProgramaEducativo::create(['programa' => 'Ing. Informática', 'clave' => 'INFO']);
        App\ProgramaEducativo::create(['programa' => 'Ing. Computación', 'clave' => 'COMP']);
    }
}
