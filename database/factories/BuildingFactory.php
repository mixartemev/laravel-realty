<?php

/* @var $factory Factory */

use App\Building;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Building::class, function (Faker $faker) {
    return [
        'address' => $faker->streetAddress,
        'type' => $faker->randomElement([1,2,3,4]),
        'class' => $faker->randomElement(['A','B','C','D']),
        'floors' => $faker->randomElement([1,2,3,4,5,9,10,12,17,20,22,25,30,44]),
        'area' => $faker->numberBetween(100, 65000),
        'metro_station_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20]),
        'metro_distance' => $faker->numberBetween(0, 60),
        'region_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20]),
    ];
});
