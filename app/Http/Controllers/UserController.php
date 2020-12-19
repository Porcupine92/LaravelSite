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

        return view('user.list', [
            'users' => $users
        ]);
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
            'user' => $user,
            'nick' => true
        ]);
    }
}
