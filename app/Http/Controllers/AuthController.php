<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function googleSignin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect() {
        $user = Socialite::driver('google')->user();
        dd($user);
    }

    public function signin()
    {
        $user = User::where('username', request('username'))->first();

        if (!$user) {
            session()->flash('gagal', 'Username or password invalid');
            return back();
        }

        $data = [
            'username' => request('username'),
            'password' => request('password')
        ];

        if (Auth::attempt($data)) {
            request()->session()->regenerate();
            return redirect()->intended();
        } else {
            session()->flash('gagal', 'Username or password invalid');
            return back();
        }
    }

    public function signup()
    {

        $data = [
            'username' => request('username'),
            'fullname' => request('fullname'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'alamat' => request('alamat'),
        ];
        if (User::create($data)) {
            session()->flash('berhasil', 'Register succesfully');
            return redirect('/signin');
        } else {
            session()->flash('gagal', 'Register unsuccesfully');
            return redirect('/signup');
        }
    }

    public function signout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/signin');
    }
}
