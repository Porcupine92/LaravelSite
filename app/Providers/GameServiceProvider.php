<?php

namespace App\Providers;

use App\Http\Controllers\Game\BuilderController;
use App\Repository\Builder\GameRepository as BuilderGameRepository;
use App\Repository\Eloquent\GameRepository as EloquentGameRepository;
use App\Repository\GameRepository;
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
        $this->app->singleton(
            GameRepository::class,
            EloquentGameRepository::class
        );

        $this->app->when(BuilderController::class)
            ->needs(GameRepository::class)
            ->give(BuilderGameRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
