<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProgramasEducativosTableSeeder::class);
        $this->call(AlumnosTableSeeder::class);
        $this->call(ProyectosTableSeeder::class);
    }
}
