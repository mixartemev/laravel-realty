<?php

/* @var $factory Factory */

use App\Building;
use App\RealtyObject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(RealtyObject::class, function (Faker $faker) {
    return [
        'planned_contact' => $faker->date(),
        'created_at' => $faker->dateTimeThisMonth,
        'type' => $faker->randomElement([1,2,3,4,5,6,7]),
        'profile' => $faker->randomElement([1,2,3,4]),
        'cadastral_numb' => $faker->shuffleString(),
        'contract_status' => $faker->randomElement([1,2]),
        'user_id' => 1,
        'building_id' => function(){
            return factory(Building::class)->create()->id;
        },
    ];
});
