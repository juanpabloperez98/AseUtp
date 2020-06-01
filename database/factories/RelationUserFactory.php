<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RelationUser;
use Faker\Generator as Faker;

$factory->define(RelationUser::class, function (Faker $faker) {
    return [
        //
        'user1_id'=>rand(1,30),
        'user2_id'=>rand(1,30),        
    ];
});
