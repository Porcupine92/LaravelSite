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
        return view('user.show', [
            'id' => $id,
            'example' => 'variable example'
        ]);
    }

    public function exampleShow(HttpRequest $request, int $id)
    {
    }

    public function testStore(HttpRequest $request, int $id)
    {
        if (!$request->isMethod('post')) {
            return 'Nie jest to POST';
        }
        dd('post store');
    }
}
