<?php

namespace App\Http\Controllers\Game;

use App\Fasade\Game;
use App\Http\Controllers\Controller;
use App\Repository\GameRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{

    private GameRepository $gameRepository;

    public function __construct(GameRepository $repository)
    {
        $this->gameRepository = $repository;
    }

    public function index(Request $request): View
    {
        $phrase = $request->get('phrase');
        $type = $request->get('type', GameRepository::TYPE_DEFAULT);
        $size = $request->get('size', 15);

        $resultPaginator = $this->gameRepository->filterBy($phrase, $type, $size);
        $resultPaginator->appends([
            'phrase' => $phrase,
            'type' => $type
        ]);

        return view('game.gameList', [
            'games' => $resultPaginator,
            'phrase' => $phrase,
            'type' => $type
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
