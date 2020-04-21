<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\subscription;
use Faker\Generator as Faker;

$factory->define(subscription::class, function (Faker $faker) {
    return [
        'role_id'=> 1,
        'user_id'  => factory(App\User::class)->create()->id
    ];
});
