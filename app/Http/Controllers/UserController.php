<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request as HttpRequest;

class UserController extends Controller
{
    public function list(HttpRequest $request)
    {
        $users = [];

        $faker = Factory::create();
        $count = $faker->numberBetween(3, 15);
        for ($i = 0; $i < $count; $i++) {
            $users[] = [
                'id' => $faker->numberBetween(1, 1000),
                'name' => $faker->firstName
            ];
        }

        $trueOrFalse = $faker->numberBetween(0, 1);

        $session = $request->session();

        $session->put('prevaction', __METHOD__ . ':' . time());
        // dd($session);

        if ($trueOrFalse) {
            $session->flash('alert', $trueOrFalse);
        } else {
            $session->flash('alert', $trueOrFalse);
        }
        // Ten rodzaj dodaje pewien klucz i jego wartość do sesji,
        // Który ginie sam na koniec następnej sesji.
        //Dobre jest np. do komunikatów o dodaniu użytkownika czy coś takiego

        return view('user.list', [
            'users' => $users
        ]);
    }

    public function show(HttpRequest $request, int $userId)
    {
        // $prevAction = $request->session()->get('prevaction'); // Pobiera wskazany klucz sesji
        // $prevAction = $request->session()->get('prevaction', 'foo');
        // dump($prevAction);

        // $request->session()->put('test_tt', null);
        // $request->session()->put('test_tt', false); // Ustala w sesji wartość pod podanym kluczem

        // dump($request->session()->has('test_tt'));  // Sprawdza czy isnieje podany klucz w sesji i czy ma jakąś wartość
        // dump($request->session()->exists('test_tt')); // Sprawdza czy istnieje podany klucz w sesji

        // $request->session()->forget('test_tt'); // Usuwa z sesji podany klucz z jego wartością

        // dump($request->session()->all()); // Pobiera wszystkie klucze sesji i ich wartości

        // $request->session()->flush(); // Czyści sesje

        // dump($request->session()->all());

        // dump($request->session()->get('flashTestParam'));

        $message = $request->session()->get('alert');

        dump($message);

        $faker = Factory::create();

        $user = [
            'id' => $userId,
            'name' => $faker->name,
            'firstName' => $faker->lastName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(12, 40),
            'html' => '<b>Bold HTML</b>'
            // 'html' => '<script>alert("XSS")</script>'
        ];

        return view('user.show', [
            'user' => $user,
            'nick' => true,
            'alert' => $message
        ]);
    }

    public function show_helper(HttpRequest $request, int $userId) // To samo co wyżej tylko za pośrednictwem helpera session()
    {
        $prevAction = session('prevaction'); // jak get()
        // $prevAction = $request->session()->get('prevaction', 'foo');
        dump($prevAction);

        // $request->session()->put('test_tt', null);
        // $request->session()->put('test_tt', false);

        session(['test__tt_1' => 'foo']); // analogia do put

        // dump($request->session()->has('test_tt'));
        // dump($request->session()->exists('test_tt'));

        // $request->session()->forget('test_tt');

        dump($request->session()->all());

        // $request->session()->flush();

        // dump($request->session()->all());

        // dump($request->session()->get('flashTestParam'));

        $faker = Factory::create();

        $user = [
            'id' => $userId,
            'name' => $faker->name,
            'firstName' => $faker->lastName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(12, 40),
            'html' => '<b>Bold HTML</b>'
            // 'html' => '<script>alert("XSS")</script>'
        ];

        return view('user.show', [
            'user' => $user,
            'nick' => true
        ]);
    }
}
