<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Game\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainPage extends Controller
{
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $id = Auth::id();

        return view('home.main', [
            'user' => $user
        ]);
    }
}
