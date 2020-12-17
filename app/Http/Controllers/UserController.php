<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request as HttpRequest;

class UserController extends Controller
{
    public function list(HttpRequest $request)
    {
        dd($request);
        return view('user.list');
    }

    public function testShow(HttpRequest $request, int $id)
    {
        // tekst

        // return "To jest zwykły tekst konwertowany przez freamwork"
        //     . "na HTTP Response. User: $id";

        // Response object

        // return response(
        //     "<h3>To jest obiekt response: User: $id</h3>",  // content
        //     200,                                            // http status
        //     ['Content-Type' => 'text/plain']                // array with headers
        // );

        // Chain response

        // return response("<h3>To jest obiekt response (Chain): User: $id</h3>")
        //     ->setStatusCode(200)
        //     ->header('Content-Type', 'text/html')
        //     ->header('Own-Header', 'Laravel');

        // Chain response with cookie (mix two ways)

        // return response(
        //     "<h3>To jest obiekt response (Mix Chain): User: $id</h3>",
        //     200
        // )
        //     ->header('Content-Type', 'text/html')
        //     ->cookie('my_best_cookie', 'oreo', 10); // czas wyrażony w minutach

        // Redirect

        // return redirect('users');

        // Redirect by route name

        // return redirect()->route('get.users');
        // return redirect()->route('get.user.address', ['id' => $id]); // w tablicy parametry wymagane dla danej trasy określone w route

        // Redirect to Controller

        // return redirect()->action('UserController@list');
        // return redirect()->action('User\ShowAddress', ['id' => $id]);

        // Redirect to other site

        // return redirect()->away('https://jjk-law.pl');

        // Return views, when we need set status, header etc.

        // return response()
        //     ->view('user.profile', ['id' => $id], 200) // wymagana jest tylko nazwa szablonu
        //     ->header('Content-Type', 'text/html');

        // Return view

        return view('user.profile', ['id' => $id]);

        // set as default: Content-Type: application/json
        // return response()->json(['id' => $id]);
    }

    public function exampleShow(HttpRequest $request, int $id)
    {
        $uri = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();

        dump($uri, $url, $fullUrl);

        $httpMethod = $request->method();

        dump($httpMethod);

        if ($request->isMethod('get')) {
            dump('to jest GET');
        }

        $all = $request->all();

        $name = $request->input('name');
        $lastName = $request->input('lastName', 'Kowalski');

        $game = $request->input('games');
        $game = $request->input('games.1');
        $game = $request->input('games.1.name');

        $allQuery = $request->query();
        $name = $request->query('name');
        $name = $request->query('name', 'Nowak');

        $expired = $request->boolean('expired');

        $hasName = $request->has('name');
        $hasParams = $request->has(['name', 'nick']);
        $hasAnyParams = $request->hasAny(['name', 'nick1']);

        $cookies = $request->cookie('my_cookie');

        $input = $request->input();
        $query = $request->query();

        dd($input, $query);

        dump($request);
        dd($id);
    }

    public function testStore(HttpRequest $request, int $id)
    {
        if (!$request->isMethod('post')) {
            return 'Nie jest to POST';
        }
        dd('post store');
    }
}
