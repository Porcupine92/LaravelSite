<?php

declare(strict_types=1);

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MainPage extends Controller
{
    public function __invoke()
    {
        return view('home.main');

        DB::table('genres')->truncate(); // Czyści całą tabelę i zeruje klucz główny
        // DB::table('genres')->delete(); // Czyści tabelę, ale nie zeruje klucza głównego

        DB::table('genres')->insert([   // Dodaje jeden rekord do tablicy
            'name' => 'RPG',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('genres')->insert([   // Dodaje tablicę rekordów do tablicy
            [
                'name' => 'Adventure',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'FPS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('genres')->insertOrIgnore([   // Dodaje rekordy lub jeśli istnieją to ignoruje
            [
                'id' => 1,
                'name' => 'Adventure 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'name' => 'FPS',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'name' => 'Adventure',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'name' => 'Sport',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        DB::table('genres')->insert([
            'name' => 'TPP',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $id = DB::table('genres')->insertGetId([ // Zwraca nam id danego wpisu
            'name' => 'SIM',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('genres') // Aktualizacja jakiegoś rekordu
            ->where('id', 14)
            ->update(['name' => 'Strategy']);

        DB::table('genres') // Usuwanie jakiegoś rekordu
            ->where('id', 14)
            ->delete();
    }
}
