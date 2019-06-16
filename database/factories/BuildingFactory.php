<?php

/* @var $factory Factory */

use App\Building;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Building::class, function (Faker $faker) {
    $floors = $faker->randomElement([1,2,3,4,5,9,10,12,17,20,22,25,30,44]);
    $metroStation = $faker->randomElement([null, 1,2,3,4,5,6,7,8,9,11,12,13,14,15]);

    return [
        'address' => $faker->streetAddress,
        'type' => $faker->randomElement([1,2,3,4]),
        'class' => $faker->randomElement(['A','B','C','D']),
        'floors' => $floors,
        'area' => $faker->numberBetween(100, 1500) * $floors,
        'metro_station_id' => $metroStation,
        'metro_distance' => $metroStation ? $faker->numberBetween(0, 60) : null,
        'metro_distance_type' => $metroStation ? $faker->randomElement([1,2]) : null,
        'region_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20]),
        'release_date' => $faker->randomElement([$faker->date('Y-m-d', '2029-01-13'), null]),
        'description' => $faker->realText(),
    ];
});
