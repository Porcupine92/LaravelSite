<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GameController extends Controller
{
    public function index(): View
    {
        // $games = DB::table('games')                      // Zwykłe wyciąganie inforamcji z danej tabeli z wybranymi kolumnami
        //     ->select('id', 'title', 'score', 'genre_id')
        //     ->get();

        $games = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'genres.id as table_genre_id',
                'genres.name as genre_name'
            )
            // ->orderBy('title', 'desc') // sortuje po tytule malejąco, domyślnie jest rosnąco
            // ->orderByDesc('score') // tutaj tylko malejąco, tylko nazwa kolumny
            // ->limit(3) // Limit zwracanych rekordów
            // ->offset(3) // Ile rekordów ma zostać pominiętych, bez ustalania offsetu, automatycznie domyślnie utalony jest na 0
            ->get();
        // Wyciaganie informacji z tabeli i łączenie ją z inną na podstawie (tutaj) id. W przypadku joina trzeba
        // pamiętać o tym żeby w selekcie wskazywać kolumny z konkretnych tabel, a w wypadku gdy nazwy są znierzne
        // dobrze jest nadawać aliasy

        return view('games.gameList', [
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
            ->where('score', '>', 9) // Sposób z operatorem
            // ->where('score', 90) // Sposób bez operatora, domyślnie wtedy brane jest =
            ->get();

        // $query = DB::table('games')
        //     ->select('id', 'title', 'score', 'genre_id')
        //     ->where([
        //         ['score', '>', 50],
        //         ['id', 55]
        //         // Sposób gdy podaje wiele where
        //     ]);

        // $query = DB::table('games')
        //     ->select('id', 'title', 'score', 'genre_id')
        //     ->where('score', '>', 95)
        //     ->orWhere('id', 55);    // Warunek lub

        $query = DB::table('games')
            ->select('id', 'title', 'score', 'genre_id');
        // ->whereIn('id', [27, 47, 53]); // Gdy dana kolumna posiada podane warunki
        // ->whereBetween('id', [33, 35]); // Gdy id jest pomiędzy pierwszą a drugą własnością

        // dd($query->get());

        $stat = [
            'count' => DB::table('games')->count(),
            'countScoreGtSeven' => DB::table('games')->where('score', '>', 7)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score')
            // Funkcje agregujące
        ];

        $scoreStats = DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('score', '>', 6) // having działa jak where ale dopiero po zgrupowaniu, where przed zgrupowaniem
            ->groupBy('score')
            ->orderByDesc('count')
            ->get();

        // dd($scoreStats->get());
        // dd($scoreStats->toSql());

        return view('games.dashboard', [
            'stats' => $stat,
            'bestGames' => $bestGames,
            'scoreStats' => $scoreStats
        ]);
    }

    public function show(int $gameId): View
    {
        // $game = DB::table('games')
        //     ->where('id', $gameId)
        //     ->get();

        // $game = DB::table('games')
        //     ->where('id', $gameId)
        //     ->first();

        $game = DB::table('games')->find($gameId); // find to podobnie jak wyżej ale działą tylko z kluczem głównym

        return view('games.game', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
