<?php

use App\Models\User;

it('user factory instance user model', function () {
    $model = factory(User::class)->create();

    assertInstanceOf(User::class, $model);
});

it('user factory has correct structure', function () {
    $model = factory(User::class)->create();

    assertArrayHasKey('first_name', $model);
    assertArrayHasKey('last_name', $model);
    assertArrayHasKey('email', $model);
    assertArrayHasKey('email_verified_at', $model);
});
