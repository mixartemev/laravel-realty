<?php

/* @var $factory Factory */

use App\Building;
use App\Contact;
use App\RealtyObject;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(RealtyObject::class, function (Faker $faker) {
    $cur = $faker->randomElement([1,2,3]);
    $dealType = $faker->randomElement([1,2,3]);
    $cost = ($cur>1?1:70)*($dealType==1?1:100)*50000;
    return [
        'planned_contact' => $faker->date(),
        'created_at' => $faker->dateTimeThisMonth,
        'currency' => $cur,
        'cost' => $faker->numberBetween($cost*0.5, $cost*5),
        'type' => $faker->randomElement([1,2,3,4,5,6,7]),
        'profile' => $faker->randomElement([1,2,3,4]),
        'power' => $faker->numberBetween(100,9000),
        'description' => $faker->realText(),
        'cadastral_numb' => $faker->domainWord.$faker->randomNumber(),
        'contract_status' => $faker->randomElement([1,2]),
        'user_id' => $faker->randomElement(User::pluck('id')->toArray()),
        'contact_id' => function() {
            return factory(Contact::class)->create()->id;
        },
        'building_id' => function() {
            return factory(Building::class)->create()->id;
        },
    ];
});
