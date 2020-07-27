<?php

use function Pest\Laravel\get;

uses()->group('dashboard');

it('can view dashboard index', function () {
    get(route('home'))
        ->assertOk()
        ->assertViewIs('dashboard.index');
});

it('dashboard index has correct data', function () {
    get(route('home'))
        ->assertViewHasAll([
            'posts',
        ]);
});
