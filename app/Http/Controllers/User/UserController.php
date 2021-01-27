<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('me.profile', [
            'user' => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('me.edit', [
            'user' => Auth::user()
        ]);
    }

    public function update(UpdateUserProfile $request)
    {
        $data = $request->validated();
        // dd($data);

        return redirect()
            ->route('me.profile')
            ->with('status', 'Profil zaktualizowany');
    }

    // public function update(Request $request)
    // {
    //     // dump($request->phone);
    //     // dd($request->all());

    //     $request->phone = str_replace(' ', '', $request->phone);

    //     dump($request->phone);

    //     $request->validate([
    //         'email' => 'required|unique:users|email',
    //         'name' => 'required|max:2',
    //         'phone' => 'numeric'
    //     ]);

    //     // $request->validate([
    //     //     'email' => ['required', 'unique:users', 'email'],
    //     //     'name' => ['required', 'max:20']
    //     // ]);

    //     return redirect()
    //         ->route('me.profile')
    //         ->with('status', 'Profil zaktualizowany');
    // }
}
