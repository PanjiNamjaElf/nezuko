<?php

use App\Models\User;
use function Pest\Laravel\assertAuthenticatedAs;
use function Pest\Laravel\assertGuest;
use function Pest\Laravel\from;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use function Tests\actingAs;

uses()->group('login');

beforeEach(function () {
    $this->user = factory(User::class)->create([
        'password' => bcrypt($this->password = 'PoppinParty'),
    ]);
});

test('can view login form', function () {
    get(route('login'))->assertOk()
        ->assertViewIs('auth.login');
});

test('cannot view login form when authenticated', function () {
    actingAs($this->user)->get(route('login'))
        ->assertRedirect(route('home'));
});

test('login with correct credentials', function () {
    post(route('login'), [
        'email'    => $this->user->email,
        'password' => $this->password,
    ])->assertRedirect(route('home'));

    assertAuthenticatedAs($this->user);
});

test('login with incorrect credentials', function () {
    from(route('login'))->post(route('login'), [
        'email'    => 'poppin.party@nezuko.me',
        'password' => 'PoppinParty',
    ])->assertRedirect(route('login'));

    assertGuest();
});

test('remember me functionality', function () {
    $response = post(route('login'), [
        'email'    => $this->user->email,
        'password' => $this->password,
        'remember' => '1',
    ]);

    $response->assertRedirect(route('home'));

    assertAuthenticatedAs($this->user);

    $this->user->refresh();

    $response->assertCookie(auth()->guard()->getRecallerName(), vsprintf('%s|%s|%s', [
        $this->user->id,
        $this->user->getRememberToken(),
        $this->user->password,
    ]));
});

test('user logged out', function () {
    post(route('login'), [
        'email'    => $this->user->email,
        'password' => $this->password,
    ])->assertRedirect(route('home'));

    assertAuthenticatedAs($this->user);

    post(route('logout'));

    assertGuest();
});
