<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tags;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Tags::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'name' => $title,
        'slug' => Str::slug($title,'-'),        
    ];
});
