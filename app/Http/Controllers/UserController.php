<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function login()
    {
        return view('authentication.user.login');
    }

    public function register()
    {
        return view('authentication.user.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'phone_number' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function facebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => Date::now()
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);

        Auth::login($user, true);

        return redirect()->route('home');
    }

    public function handleProviderCallbackFB()
    {
        // $callback = Socialite::driver('facebook')->stateless()->user();
        // $data = [
        //     'name' => $callback->getName(),
        //     'email' => $callback->getEmail(),
        //     'avatar' => $callback->getAvatar(),
        //     'email_verified_at' => Date::now()
        // ];

        return 'hello';

        // $user = User::firstOrCreate(['email' => $data['email']], $data);

        // Auth::login($user, true);

        // return redirect()->route('home');
    }
}
