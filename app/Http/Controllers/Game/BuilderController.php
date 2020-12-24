<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BuilderController extends Controller
{
    public function index(): View
    {
        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'genres.id as table_genre_id',
                'genres.name as genre_name'
            )
            ->paginate(10);

        return view('builder.gameList', [
            'games' => $games
        ]);
    }

    public function dashboard(): View
    {
        $bestGames = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'genres.id as table_genre_id',
                'genres.name as genre_name'
            )
            ->where('score', '>', 9)
            ->get();

        $query = DB::table('games')
            ->select('id', 'title', 'score', 'genre_id');

        $stat = [
            'count' => DB::table('games')->count(),
            'countScoreGtSeven' => DB::table('games')->where('score', '>', 7)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score')
        ];

        $scoreStats = DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('score', '>', 6)
            ->groupBy('score')
            ->orderByDesc('count')
            ->get();

        return view('builder.dashboard', [
            'stats' => $stat,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameId): View
    {
        $game = DB::table('games')->find($gameId);

        return view('builder.game', [
            'game' => $game
        ]);
    }
}
