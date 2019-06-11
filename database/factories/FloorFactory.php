<?php

/* @var $factory Factory */

use App\Floor;
use App\RealtyObject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Floor::class, function (Faker $faker) {
    return [
        'number' => $faker->randomDigit,
        'name' => $faker->randomElement(['этаж','подвал','мансарда','крыша', 'цоколь']),
        'area' => $faker->randomFloat(1,22,6000),
        'ceiling' => $faker->randomFloat(1,2,6),
        'realty_object_id' => function(){
            return factory(RealtyObject::class)->create()->id;
        },
    ];
});
