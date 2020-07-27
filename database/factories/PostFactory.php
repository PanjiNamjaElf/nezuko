<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'   => $faker->words($faker->numberBetween(2, 10), true),
        'content' => $faker->paragraphs(50, true),
        'status'  => $faker->randomElement(['published', 'draft']),
        'user_id' => fn () => factory(User::class)->create()->id,
    ];
});
