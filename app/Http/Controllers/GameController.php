<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = Factory::create();
        $i = 0;

        for ($i; $i <= 10; $i++) {
            $gamesList[] = [
                'name' => $faker->name,
                'organization' => $faker->company,
                'shortStory' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'playingHours' => $faker->numberBetween(1, 100),
            ];
        }

        return view('games.gamesList', [
            'gamesList' => $gamesList
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
     * Display the specified resource.
     *
     * @param  int  $game
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $faker = Factory::create();
        $game[] = [
            'name' => $faker->name,
            'organization' => $faker->company,
            'shortStory' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'playingHours' => $faker->numberBetween(1, 100),
        ];

        return view('games.game', [
            'game' => $game
        ]);
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
