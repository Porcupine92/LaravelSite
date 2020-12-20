<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;

class MainPage extends Controller
{
    public function __invoke()
    {
        $config = config();

        // dd($config);
        return view('home.main');
    }
}
