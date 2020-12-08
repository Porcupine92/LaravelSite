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
// Route::get($uri, fn () => 'jestem arrow GET');
// Route::post($uri, fn () => 'jestem POST');
// Route::put($uri, fn () => 'jestem PUT');         // metoda z arrow function
// Route::patch($uri, fn () => 'jestem PATCH');
// Route::delete($uri, fn () => 'jestem DELETE');
// Route::options($uri, fn () => 'jestem OPTIONS');

Route::get($uri, 'ExampleController@get');
Route::post($uri, 'ExampleController@post');
Route::put($uri, 'ExampleController@put');
Route::patch($uri, 'ExampleController@patch');          // metoda z wykorzystaniem Controllera
Route::delete($uri, 'ExampleController@delete');
Route::options($uri, 'ExampleController@options');

Route::match(['get', 'post'], '/match', function () {
    return 'jestem getem i postem';
});

Route::any('/all', fn () => 'Dopuszczone wszytskie metody');

Route::view('/view/route', 'route.view');

Route::view(
    'view/route/var1',
    'route.viewParam',                                          // metoda daje możliwość od razu wygenerować view pomijając controller i z dodatkiem parametrów
    ['param1' => 'var1 - to nasze dane', 'name' => 'Szymon']
);

Route::view(
    'view/route/var2',
    'route.viewParam',
    ['param1' => 'inna trasa', 'name' => 'Marcela']
);

// Route::get('posts/{postId}/{title}', function (int $postId, string $title) {        // Tzw. domknięcie, czy funkcja anonimowa
//     print($title);
//     dd($postId);
// });

Route::get('posts/{postId}/{title}', 'ExampleController@posts');

// Route::get('users/{nick?}', function (string $nick = null) {   // znak zapytania na końcu parametru to wskazanie,że
//     dd($nick);                                                 // podany parametr jest opcjonalny, trzeba dodać do funkcji null
// });

// Route::get('users/{nick?}', function (string $nick = 'Anna') {  // zdefiniowana wartość na wypadek gdy nie jest podany parametr
//     dd($nick);
// });

Route::get('users/{nick?}', function (string $nick = 'Anna') {
    dd($nick);
})->where(['nick' => '[a-z A-Z 0-9]+']); // chain(łańcuch) to wskazanie, że dany parametr ma mieć konkretne parametry np. poprzez wyrażenie regularne

Route::get('items', function () {
    return 'Items';
})
    ->name('shop.items'); // nadajemy nazwę na konkretny routing

Route::get('items/{id}', function (int $id) {
    return 'Item: ' . $id;
})
    ->name('shop.item.single');  // nadajemy nazwę na konkretny routing

Route::get('names', function () {
    // $url = route('shop.items');  // korzystamy z metody, pobieramy adres url routingu o konkretnej nazwie
    $url = route('shop.item.single', ['id' => 444]);  // korzystamy z metody, pobieramy adres url routingu o konkretnej nazwie i z parametrem

    print($url);
});
