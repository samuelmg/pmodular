<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proyecto;
use Faker\Generator as Faker;

$factory->define(Proyecto::class, function (Faker $faker) {
    return [
        'nombre_proyecto' => $faker->sentence(),
        'descripcion' => $faker->paragraph(),
    ];
});
