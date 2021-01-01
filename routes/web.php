<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::middleware(['auth'])->group(function () {
Route::group(['middleware' => ['auth']], function () {

    Route::get('/', 'Home\MainPage')
        ->name('home.mainPage');

    // USERS
    Route::get('users', 'UserController@list')
        ->name('get.users');

    Route::get('users/{userId}', 'UserController@show')
        ->name('get.user.show');

    //Route::get('users/{id}/profile', 'User\ProfilController@show')
    //    ->name('get.user.profile');

    Route::get('users/{id}/address', 'User\ShowAddress')
        ->where(['id' => '[0-9]+'])
        ->name('get.users.address');


    // GAMES
    Route::group([
        'prefix' => 'b/games',
        'namespace' => 'Game',
        'as' => 'builder.b.'
    ], function () {
        Route::get('dashboard', 'BuilderController@dashboard')
            ->name('dashboard');

        Route::get('', 'BuilderController@index')
            ->name('list');

        Route::get('{game}', 'BuilderController@show')
            ->name('show');
    });

    Route::group([
        'prefix' => 'games',
        'namespace' => 'Game',
        'as' => 'games.'
    ], function () {
        Route::get('dashboard', 'GameController@dashboard')
            ->name('dashboard');

        Route::get('', 'GameController@index')
            ->name('list');

        Route::get('{game}', 'GameController@show')
            ->name('show');
    });


    Route::group([
        'prefix' => 'e/games',
        'namespace' => 'Game',
        'as' => 'games.e.',
        // 'middleware' => ['profiling']
    ], function () {

        Route::get('dashboard', 'EloquentController@dashboard')
            ->name('dashboard');

        Route::get('', 'EloquentController@index')
            ->name('list');

        Route::get('{game}', 'EloquentController@show')
            ->name('show');
        // ->middleware('profiling');

        // Route::middleware(['profiling'])->group(
        //     function () {
        //         Route::get('dashboard', 'EloquentController@dashboard')
        //             ->name('dashboard');

        //         Route::get('', 'EloquentController@index')
        //             ->name('list');

        //         Route::get('{game}', 'EloquentController@show')
        //             ->name('show');
        //     }
        // );
    });
});

Auth::routes();