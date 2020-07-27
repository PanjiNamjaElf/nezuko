<?php

/**
 * @author    Panji Setya Nur Prawira <kstar.panjinamjaelf@gmail.com>
 * @copyright Copyright (c) 2020, Panji Setya Nur Prawira
 */
Route::prefix('auth')->group(function () {
    Auth::routes([
        'register' => false,
        'reset'    => false,
        'verify'   => false,
    ]);
});

/*
|------------------------------------------
| Website (Not Authorized)
|------------------------------------------
*/

Route::get('/', 'DashboardController@index')->name('home');

Route::name('posts.')->group(function () {
    Route::get('posts/{post}', 'PostController@show')->name('show');
});

Route::middleware('guest')->group(function () {
    //
});

/*
|------------------------------------------
| Website (Authorized)
|------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::resource('posts', 'PostController')->except('show');
});
