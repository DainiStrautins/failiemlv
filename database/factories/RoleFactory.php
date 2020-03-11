<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'id' => $faker->sentence(4),
        'role_id'=> 1,
        'user_id'  => factory(App\User::class)->create()->id
    ];
});
