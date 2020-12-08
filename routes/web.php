<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', 'HelloController@hello');

Route::get('/goodbye/{name}', function (string $name) {
    return 'Goodbye: ' . $name;
});

// Route::get('/example', function () {
//     return 'jestem GET';
// });
$uri = '/example';
Route::get($uri, fn () => 'jestem arrow GET');
Route::post($uri, fn () => 'jestem POST');
Route::put($uri, fn () => 'jestem PUT');
Route::patch($uri, fn () => 'jestem PATCH');
Route::delete($uri, fn () => 'jestem DELETE');
Route::options($uri, fn () => 'jestem OPTIONS');

Route::match(['get', 'post'], '/match', function () {
    return 'jestem getem i postem';
});

Route::any('/all', fn () => 'Dopuszczone wszytskie metody');

Route::view('/view/route', 'route.view');

Route::view(
    'view/route/var1',
    'route.viewParam',
    ['param1' => 'var1 - to nasze dane', 'name' => 'Szymon']
);

Route::view(
    'view/route/var2',
    'route.viewParam',
    ['param1' => 'inna trasa', 'name' => 'Marcela']
);
