<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContactModel;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ContactModel::class, function (Faker $faker) {
    return [
        //
        'first_name'    => $faker->firstName,
        'last_name'     => $faker->lastName,
        'phone'         => $faker->unique()->phoneNumber,
    ];
});
