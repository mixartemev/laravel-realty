<?php

/* @var $factory Factory */

use App\Contact;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName.' '.$faker->lastName,
        'brand_name' => $faker->company,
        'position' => $faker->randomElement(['директор','уборщица','секретарь','менеджер']),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'web' => $faker->url,
        'additional_contact' => $faker->phoneNumber,
        'description' => $faker->text,
        'requisites' => $faker->text,
    ];
});
