<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Alumno;
use Faker\Generator as Faker;

$factory->define(Alumno::class, function (Faker $faker) {
    return [
        'programa_educativo_id' => $faker->numberBetween(1, 2),
        'nombre' => $faker->name,
        'correo' => $faker->unique()->safeEmail,
        'codigo' => $faker->randomNumber(),
        'fecha_nacimiento' => $faker->date(),
    ];
});
