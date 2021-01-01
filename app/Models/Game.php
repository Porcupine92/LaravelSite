<?php

namespace App\Models;

use App\Model\Scope\LastWeekScope;
use App\Models\Scope\LastWeekScope as ScopeLastWeekScope;
use Illuminate\Database\Eloquent\Builder;
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

    protected $fillable = [
        'title', 'description', 'score', 'publisher_id', 'genre_id', 'requirements'
    ];

    protected static function booted()
    {
        // static::addGlobalScope(new ScopeLastWeekScope);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function scopeBest(Builder $query): Builder
    {
        return $query
            ->with('genre')
            ->where('score', '>', 9)
            ->orderBy('score', 'desc');
    }

    public function scopeGenre(Builder $query, int $genreId): Builder
    {
        return $query
            ->where('genre_id', $genreId);
    }

    public function scopePublisher(Builder $query, int $publisherId): Builder
    {
        return $query
            ->where('publisher_id', $publisherId);
    }
}
