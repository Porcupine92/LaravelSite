<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    public function get()
    {
        dd('jestem Getem');
    }

    public function post()
    {
        dd('jestem Postem');
    }

    public function put()
    {
        dd('jestem Putem');
    }

    public function patch()
    {
        dd('jestem Patchem');
    }

    public function delete()
    {
        dd('jestem Deletem');
    }

    public function options()
    {
        dd('jestem Optionem');
    }

    public function posts(int $postId, string $title)
    {
        print($title);
        dd($postId);
    }
}
