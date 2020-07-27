<?php

use App\Models\Post;

it('post factory instance user model', function () {
    $model = factory(Post::class)->create();

    assertInstanceOf(Post::class, $model);
});

it('post factory has correct structure', function () {
    $model = factory(Post::class)->create();

    assertArrayHasKey('user_id', $model);
    assertArrayHasKey('title', $model);
    assertArrayHasKey('slug', $model);
    assertArrayHasKey('content', $model);
    assertArrayHasKey('status', $model);
});
