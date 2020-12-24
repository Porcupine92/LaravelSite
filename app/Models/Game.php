<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // protected $table = 'application_game';
    // Potrzebne gdy nazwa tabeli nie jest skorelowana z nazwą modelu
    // protected $table = 'games';
    // default, nie trzeba określać

    // protected $primaryKey = 'id';
    // domyślnie głównym kluczem jest kolumna id
    // ta zmienna ustawia co jest kluczem głównym

    // protected $timestamps = false;
    //  Kolumny created_at i updated_at nie będą szukane

    // protected $attributes = [
    //     'score' => 5
    // ];
    //  domyślne wartości dla konkretnych kolumn


}
