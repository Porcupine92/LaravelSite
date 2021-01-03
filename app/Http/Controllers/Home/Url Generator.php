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
        // $current = url()->current();

        // $fullUrl = url()->full();

        // $url = url()->previous();

        // $url = url('path/to/something');
        // $gameId = 44;
        // dump(url("games/$gameId"));

        // $routeUrl = route('games.show', ['game' => $gameId]);
        // $routeUrl = route('games.show', [
        //     'game' => $gameId,
        //     'foo' => 'bar',
        //     'test' => 1
        //     ]);

        // $actionUrl = action([GameController::class, 'dashboard']);
        // $actionUrl = action([GameController::class, 'show'], ['game' => $gameId, 'foo' => 'bar']);

        // dump($actionUrl);
        // dd('end');

        $user = Auth::user();
        $id = Auth::id();

        return view('home.main', [
            'user' => $user
        ]);
    }
}
