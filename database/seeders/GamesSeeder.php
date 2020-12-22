<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('games')->truncate();

        $games = [];

        for ($i = 0; $i < 100; $i++) {
            $games[] = [
                'title' => $faker->words($faker->numberBetween(1, 3), true),
                'description' => $faker->sentence,
                'publisher_id' => $faker->numberBetween(1, 1000),
                'genre_id' => $faker->numberBetween(1, 5),
                'score' => $faker->numberBetween(1, 100),
                'requirements' => $faker->randomElement(['Low', 'Medium', 'High', 'Extra High']),
                'pegi' => $faker->numberBetween(3, 18),
                'release_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        DB::table('games')->insert($games);

        // for ($i = 0; $i < 1000; $i++) {
        //     DB::table('games')->insert([
        //         'title' => $faker->words($faker->numberBetween(1, 3), true),
        //         'description' => $faker->sentence,
        //         'publisher' => $faker->randomElement(['Atari', 'EA', 'Blizzard', 'Ubisoft', 'Sega', 'Sony', 'Nitendo']),
        //         'genre_id' => $faker->numberBetween(1, 5),
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
        //  To się długo wykonuje poniewać powyższy kod wykonuje 1000 zapytań do bazy danych
    }
}
