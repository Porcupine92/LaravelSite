<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Repository\GameRepository;
use Illuminate\View\View;

class EloquentController extends Controller
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }

    public function index(): View
    {
        return view('game.gameList', [
            'games' => $this->gameRepository->allPaginated(10)
        ]);
    }

    public function dashboard(): View
    {
        return view('game.dashboard', [
            'stats' => $this->gameRepository->stats(),
            'bestGames' => $this->gameRepository->best(),
            'scoreStats' => $this->gameRepository->scoreStats()
        ]);
    }

    public function show(int $gameId): View
    {
        return view('game.game', [
            'game' => $this->gameRepository->get($gameId)
        ]);
    }
}
