<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\View\View;

class EloquentController extends Controller
{
    public function index(): View
    {
        // Spodoby na dodaanie rekordów do bazy danych

        // $newGame = new Game();
        // $newGame->title = 'Tomb Raider';
        // $newGame->description = 'Przygoda, skarby itp';
        // $newGame->score = 9;
        // $newGame->publisher_id = 4;
        // $newGame->genre_id = 4;
        // $newGame->requirements = 'Low';

        // $newGame->save();

        // Game::create([
        //     'title' => 'Tomb Raider 2',
        //     'description' => 'Przygoda, skarby itp',
        //     'score' => 8,
        //     'publisher_id' => 4,
        //     'genre_id' => 3,
        //     'requirements' => 'Low'
        // ]);

        // $newGame = new Game([
        //     'title' => 'Tomb Raider 3',
        //     'description' => 'Przygoda, skarby itp',
        //     'score' => 8,
        //     'publisher_id' => 4,
        //     'genre_id' => 3,
        //     'requirements' => 'Low'
        // ]);
        // $newGame->save();

        // Aktualizacja bazy danych

        // $game = Game::find(107);
        // dump($game);

        // $game->description = 'Opis po aktualizacji';
        // $game->genre_id = 1;
        // $game->save();

        // $gameIds = [100, 101, 102, 103, 104];

        // Game::whereIn('id', $gameIds)
        //     ->update([
        //         'description' => 'Updatowanie wielu rekordów'
        //     ]);

        // Usuwanie danych z bazy

        // $game = Game::find(107);

        // Logika odpowiedzialna za zapytanie czy na pewno chcesz usunąć rekord

        // $game->delete();

        // Game::destroy(106);
        // Game::destroy(104, 105);
        // Game::destroy([104, 105]);
        // Game::whereIn('id', [118, 119])
        //     ->delete();


        $games = Game::with('genre')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('eloquent.gameList', [
            'games' => $games
        ]);
    }

    public function dashboard(): View
    {
        $bestGames = Game::best()
            ->get();

        $stats = [
            'count' => Game::count(),
            'countScoreGtSeven' => Game::where('score', '>', 7)->count(),
            'max' => Game::max('score'),
            'min' => Game::min('score'),
            'avg' => Game::avg('score')
        ];

        $scoreStats = Game::select(
            Game::raw('count(*) as count'),
            'score'
        )
            ->having('score', '>', 6)
            ->groupBy('score')
            ->orderByDesc('count')
            ->get();

        return view('eloquent.dashboard', [
            'stats' => $stats,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameId): View
    {
        $game = Game::find($gameId);
        // $game = Game::findOrFail($gameId);
        // $game = Game::where('id', $gameId)->first();
        // $game = Game::firstWhere('id', $gameId);

        return view('eloquent.game', [
            'game' => $game
        ]);
    }
}
