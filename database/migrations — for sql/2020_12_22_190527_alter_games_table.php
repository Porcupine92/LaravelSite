<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('publisher');
            $table->integer('publisher_id');
            $table->float('score')->nullable();
            $table->string('requirements', 25);
            $table->integer('pegi')->nullable();
            $table->date('release_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('games', function (Blueprint $table) {
            $table->string('publisher', 100)->comment('game publisher');
            $table->dropColumn('publisher_id');
            $table->dropColumn('score');
            $table->dropColumn('requirements');
            $table->dropColumn('pegi');
            $table->dropColumn('release_at');
        });
    }
}
