<?php

namespace App\Http\Controllers\Game;

use App\Fasade\Game;
use App\Http\Controllers\Controller;
use App\Repository\GameRepository;
use Illuminate\View\View;

class GameController extends Controller
{

    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
<<<<<<< HEAD
        dump($repository);
=======
>>>>>>> 820e025e02171cf186dc1ebddf9fb937cf9ce1b0
        $this->gameRepository = $repository;
    }

    public function index(): View
    {
        return view('game.gameList', [
            // 'games' => $this->gameRepository->allPaginated(10)
            'games' => Game::allPaginated(10)
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
