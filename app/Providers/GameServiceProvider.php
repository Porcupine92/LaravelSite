<?php

namespace App\Providers;

use App\Models\Game;
use App\Repository\Eloquent\GameRepository as EloquentGameRepository;
use App\Repository\GameRepository;
use App\Service\FakeService;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     GameRepository::class,
        //     EloquentGameRepository::class
        // );
        // Kontener zależnośći widzi powyższy kod i wykonuje coś takiego
        // return new EloquentGameRepository(new GameModel(...));

        // $this->app->bind(
        //     GameRepository::class,
        //     function ($app) {
        //         return new EloquentGameRepository(
        //             new Game()
        //         );
        //     } // Callback musi zwrócić instancje obiektu, który chcemy powiązać z tym interfejsem
        // );

        $this->app->bind(
            GameRepository::class,
            function ($app) {
                $config = config('session.driver');
                $gameModel = $app->make(Game::class);
                $fakeService = $app->make(FakeService::class);

                return new EloquentGameRepository($gameModel, $fakeService);
            }
        );
        //  Callback używamy gdy np. w tym wypadku EloquentGameRepository wymagałoby jeszcze dodatkowo podania jakiegoś parametru
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
