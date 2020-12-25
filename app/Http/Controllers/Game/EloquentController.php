<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\View\View;

class EloquentController extends Controller
{
    public function index(): View
    {
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

        return view('eloquent.game', [
            'game' => $game
        ]);
    }
}
