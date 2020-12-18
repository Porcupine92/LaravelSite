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
        dd($request);
        return view('user.list');
    }

    public function show(int $userId)
    {
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
            'user' => $user
        ]);
    }
}
