<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MainPage extends Controller
{
    public function __invoke()
    // public function __invoke(Request $request)
    {
        // if (Auth::check()) {
        //     // Jeśli użytkownik jest zalogowany zwróci true
        //     // dd('Jestem zalogowany');
        // }
        // Ogólnie sprawdzaniem zajmuje się middleware auth więc nie ma potrzeby tutaj w akcji tego robić
        // Ewentualnie w jakiś wyjątkowych sytuacjach

        $user = Auth::user();
        // $user = $request->user();
        // Pobieranie danych o użytkowniku

        $id = Auth::id();

        // dd($id);

        // Auth::logout(); // Wylogowuje użytkownika

        return view('home.main', [
            'user' => $user
        ]);
    }
}
