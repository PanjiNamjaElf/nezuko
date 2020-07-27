<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @package   Nezuko - Content Management System
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName,
        'last_name'         => $faker->lastName,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => Carbon::now(),
        'password'          => bcrypt('nezuko'),
    ];
});
