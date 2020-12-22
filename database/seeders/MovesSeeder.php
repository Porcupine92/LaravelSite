<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moves')->truncate();

        $faker = Factory::create();

        $movies = [];

        for ($i = 0; $i < 50; $i++) {
            $movies[] = [
                'name' => $faker->words($faker->numberBetween(1, 3), true),
                'duration' => $faker->numberBetween(60, 120),
                'genres' => $faker->randomElement(['Fantasy', 'Horror', 'Sci-fi', 'Romance', 'Family', 'For Kids']),
                'game_id' => $faker->numberBetween(1, 1000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('moves')->insert($movies);
    }
}
