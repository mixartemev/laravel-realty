<?php

/* @var $factory Factory */

use App\Floor;
use App\RealtyObject;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Floor::class, function (Faker $faker) {
    /** @var RealtyObject $block */
    $block = factory(RealtyObject::class)->create();
    return [
        'number' => $faker->numberBetween(1, $block->building->floors),
        'type' => $faker->randomElement([1,2,3,4,5,6,7]),
        'area' => $faker->randomFloat(1,22,6000),
        'ceiling' => $faker->randomFloat(1,2,6),
        'realty_object_id' => $block->id,
    ];
});
