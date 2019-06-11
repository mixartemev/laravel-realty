<?php

/* @var $factory Factory */

use App\Building;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Building::class, function (Faker $faker) {
    return [
        'address' => $faker->streetAddress,
        'type' => $faker->randomElement([1,2,3,4]),
        'metro_station_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20]),
        'region_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20]),
    ];
});
