<?php

/* @var $factory Factory */

use App\Building;
use App\Floor;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Floor::class, function (Faker $faker) {
    return [
        'number' => $faker->randomDigit,
        'area' => $faker->randomFloat(1,22,6000),
        'ceiling' => $faker->randomFloat(1,2,6),
        'building_id' => function(){
            return factory(Building::class)->create()->id;
        },
    ];
});
