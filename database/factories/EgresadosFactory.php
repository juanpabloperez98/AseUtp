<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Egresados;
use Faker\Generator as Faker;

$factory->define(Egresados::class, function (Faker $faker) {
    return [

        'tipo_documento' => $faker->randomElement(['cedula ciudadanía','cedula extrajera','pasaport']),
        'documento' => $faker->randomNumber($nbDigits = 7),
        'edad' => $faker->numberBetween(20,50),
        'pais' => $faker->country(),
        'descripcion' => $faker->text(300),
        'programa' => $faker->randomElement(['Ingenierias','Licenciaturas','Bellas artes','Ambiental']),
        'genero' => $faker->randomElement(['Masculino','Femenino','Otro']),        
        'user_id' => $faker->unique()->numberBetween(1,30),
    ];
});
