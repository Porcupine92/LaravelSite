<?php

// Komendy artisanowe
// php artisan migrate - tworzy tabele w danej bazie na podstawie liku migracyjnego
// php artisan make:migration create_nazwa_tabeli - tworzy migracje z podaną nazwą
// php atrisan migrate:status - status
// php artisan migrate:rollback - cofa ostatnią modyfikację w tabelach, ostatnie zmiany w migracjach,
//                                kolejna komenda cofa jeszcze dalej itd.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::connetion('sqlite')->create('games', function (Blueprint $table) {});
        // Tworzy tabele przy odpaleniu komendy php artisan migrate, ale w konkretnym połączeniu z bazą
        // Poniżej z domyślną bazą

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->string('publisher', 100)->comment('game publisher');
            $table->float('score')->nullable();
            $table->timestamps();
        });
        // tak się tworzy kolumny

        // Schema::rename($from, $to); // Zmienia nazwę tabeli

        // if (Schema::hasTable('games')) { // Jeśli ma tabelę to zrób coś tam
        //     // ...
        // })
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games'); // usuwa tabelę jeśli istnieje
        // Schema::drop('games'); // usuwa tabelę
    }
}
