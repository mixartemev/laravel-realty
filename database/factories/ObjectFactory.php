<?php

/* @var $factory Factory */

use App\Floor;
use App\RealtyObject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(RealtyObject::class, function (Faker $faker) {
    return [
        'planned_contact' => $faker->date('d.m.Y'),
        'created_at' => $faker->date('d.m.Y'),
        'cadastral_numb' => $faker->shuffleString(),
        'ceiling' => $faker->randomFloat(1,2,6),
        'contract_status' => $faker->randomElement([1,2]),
        'area' => $faker->randomFloat(1,20,600),
        'user_id' => 1,
        'floor_id' => function(){
            return factory(Floor::class)->create()->id;
        },
    ];
});
