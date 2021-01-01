<?php

declare(strick_types=1);

namespace App\Fasade;

use App\Repository\GameRepository;
use Illuminate\Support\Facades\Facade;

class Game extends Facade
{
    protected static function getFacadeAccessor()
    {
        // return GameRepository::class;
        return 'game';
    }
}
