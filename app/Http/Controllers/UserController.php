<?php

declare(strict_types=1);

namespace App\Http\Controllers;

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

        dump($all);

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
