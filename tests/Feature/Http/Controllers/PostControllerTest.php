<?php

use App\Models\Post;
use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Tests\actingAs;

uses()->group('post');

it('can view post index', function () {
    actingAs()->get(route('posts.index'))
        ->assertOk()
        ->assertViewIs('post.index');
});

it('post index has correct data', function () {
    actingAs()->get(route('posts.index'))
        ->assertViewHasAll([
            'posts',
        ]);
});

it('can view create post form', function () {
    actingAs()->get(route('posts.create'))
        ->assertOk()
        ->assertViewIs('post.create');
});

it('redirect to post index when store new post', function () {
    /** @var \Tests\TestCase $this */

    actingAs()->post(route('posts.store'), [
        'title'   => $this->faker->words(10, true),
        'content' => $this->faker->paragraphs(5, true),
        'status'  => $this->faker->randomElement(['published', 'draft']),
    ])->assertRedirect(route('posts.index'));
});

it('can view post', function () {
    $post = factory(Post::class)->create();

    get(route('posts.show', $post))
        ->assertOk()
        ->assertViewIs('post.show');
});

it('view post has correct data', function () {
    $post = factory(Post::class)->create();

    get(route('posts.show', $post))
        ->assertViewHasAll([
            'post',
        ]);
});

it('authenticated user has authority to view edit post form', function () {
    $user = factory(User::class)->create();
    $post = factory(Post::class)->create([
        'user_id' => $user->id,
    ]);

    actingAs($user)->get(route('posts.edit', $post))
        ->assertOk()
        ->assertViewIs('post.edit');
});

it('forbid if authenticated user doesnt have authority to view edit post form', function () {
    $post = factory(Post::class)->create();

    actingAs()->get(route('posts.edit', $post))
        ->assertForbidden();
});

it('redirect to post index if authenticated user has authority to update post', function () {
    /** @var \Tests\TestCase $this */

    $user = factory(User::class)->create();
    $post = factory(Post::class)->create([
        'user_id' => $user->id,
    ]);

    actingAs($user)->put(route('posts.update', $post), [
        'title'   => $this->faker->words(10, true),
        'content' => $this->faker->paragraphs(5, true),
        'status'  => $this->faker->randomElement(['published', 'draft']),
    ])->assertRedirect(route('posts.index'));
});

it('forbid if authenticated user doesnt have authority to update post', function () {
    /** @var \Tests\TestCase $this */

    $post = factory(Post::class)->create();

    actingAs()->put(route('posts.update', $post), [
        'title'   => $this->faker->words(10, true),
        'content' => $this->faker->paragraphs(5, true),
        'status'  => $this->faker->randomElement(['published', 'draft']),
    ])->assertForbidden();
});

it('response no content if authenticated user has authority to delete post', function () {
    $user = factory(User::class)->create();
    $post = factory(Post::class)->create([
        'user_id' => $user->id,
    ]);

    actingAs($user)->delete(route('posts.destroy', $post))
        ->assertNoContent();
});

it('delete post when authenticated user has the authority', function () {
    $user = factory(User::class)->create();
    $post = factory(Post::class)->create([
        'user_id' => $user->id,
    ]);

    actingAs($user)->delete(route('posts.destroy', $post));

    assertDatabaseMissing('posts', $post->toArray());
});

it('dont delete post when authenticated user doesnt have the authority', function () {
    $post = factory(Post::class)->create();

    actingAs()->delete(route('posts.destroy', $post));

    assertDatabaseHas('posts', $post->toArray());
});
