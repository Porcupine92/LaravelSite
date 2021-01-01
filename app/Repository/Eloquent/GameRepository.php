<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Game;
use App\Repository\GameRepository as GameRepositoryInterface;

class GameRepository implements GameRepositoryInterface
{
    private Game $gameModel;

    public function __construct(Game $gameModel)
    {
        $this->gameModel = $gameModel;
    }
    public function get(int $id)
    {
        // return Game::find($id);
        return $this->gameModel->find($id);
    }

    public function all()
    {
        return $this->gameModel
            ->with('genre')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function allPaginated(int $limit)
    {
        return $this->gameModel
            ->with('genre')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    public function best()
    {
        return $this->gameModel
            ->best()
            ->get();
    }

    public function stats()
    {
        return [
            'count' => $this->gameModel->count(),
            'countScoreGtSeven' => $this->gameModel->where('score', '>', 7)->count(),
            'max' => $this->gameModel->max('score'),
            'min' => $this->gameModel->min('score'),
            'avg' => $this->gameModel->avg('score')
        ];
    }

    public function scoreStats()
    {
        return $this->gameModel->select(
            $this->gameModel->raw('count(*) as count'),
            'score'
        )
            ->having('score', '>', 6)
            ->groupBy('score')
            ->orderByDesc('count')
            ->get();
    }
}
