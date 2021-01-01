<?php

declare(strict_types=1);

namespace App\Repository\Builder;

use App\Models\Game;
use App\Repository\GameRepository as GameRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use stdClass;

class GameRepository implements GameRepositoryInterface
{
    private Game $gameModel;

    public function __construct()
    {
    }
    public function get(int $id)
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->join('publishers', 'games.publisher_id', '=', 'publishers.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'games.description',
                'genres.id as table_genre_id',
                'genres.name as genre_name',
                'publishers.id as publisher_id',
                'publishers.name as publisher_name'
            )
            ->where('games.id', $id)
            ->first();

        return $this->createGame($data);
    }

    public function all()
    {
        return DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'genres.id as table_genre_id',
                'genres.name as genre_name'
            )
            ->latest('games.created_at')
            ->get()
            ->map(fn ($row) => $this->createGame($row));
    }

    public function allPaginated(int $limit)
    {
        $pageName = 'page';
        $currentPage = Paginator::resolveCurrentPage($pageName);

        $baseQuery = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id');
        $total = $baseQuery->count();

        $data = collect();
        if ($total) {
            $data = $baseQuery
                ->select(
                    'games.id',
                    'games.title',
                    'games.score',
                    'genres.id as table_genre_id',
                    'genres.name as genre_name'
                )
                ->latest('games.created_at')
                ->forPage($currentPage, $limit)
                ->get()
                ->map(fn ($row) => $this->createGame($row));
        }

        return new LengthAwarePaginator(
            $data,
            $total,
            $limit,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => $pageName
            ]
        );
    }

    public function best()
    {
        $data = DB::table('games')
            ->join('genres', 'games.genre_id', '=', 'genres.id')
            ->select(
                'games.id',
                'games.title',
                'games.score',
                'genres.id as table_genre_id',
                'genres.name as genre_name'
            )
            ->where('score', '>', 9)
            ->get()
            ->map(fn ($row) => $this->createGame($row));

        return $data;
    }

    public function stats()
    {
        return [
            'count' => DB::table('games')->count(),
            'countScoreGtSeven' => DB::table('games')->where('score', '>', 7)->count(),
            'max' => DB::table('games')->max('score'),
            'min' => DB::table('games')->min('score'),
            'avg' => DB::table('games')->avg('score')
        ];
    }

    public function scoreStats()
    {
        return DB::table('games')
            ->select(DB::raw('count(*) as count'), 'score')
            ->having('score', '>', 6)
            ->groupBy('score')
            ->orderByDesc('count')
            ->get();
    }

    private function createGame(stdClass $game): stdClass
    {
        if (isset($game->publisher_id)) {
            $publisher = new stdClass();
            $publisher->id = $game->publisher_id;
            $publisher->name = $game->publisher_name;

            $game->publisher = $publisher;

            unset($game->publisher_id, $game->publisher_name);
        }
        $genre = new stdClass();
        $genre->id = $game->table_genre_id;
        $genre->name = $game->genre_name;

        $game->genre = $genre;

        unset($game->table_genre_id, $game->genre_name);

        return $game;
    }
}
