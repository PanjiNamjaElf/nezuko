<?php

namespace Tests;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Set the currently logged in user for the application.
 *
 * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
 * @param  string|null  $driver
 * @return TestCase
 */
function actingAs(Authenticatable $user = null, string $driver = null)
{
    if (! $user) {
        $user = factory(User::class)->create();
    }

    return test()->actingAs($user);
}
