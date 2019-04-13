<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Addressbook::class, function (Faker $faker) {
    return [
    	'owner_uid'=>App\Model\User::all()->random()->uid,
        'name' => $faker->unique()->name,
        'LastName' => $faker->name,
        'mail' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber
    ];
});
