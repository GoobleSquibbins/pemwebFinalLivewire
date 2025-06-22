<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\genre;

use Illuminate\Support\Facades\Hash;

class CinemaController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return back()->withErrors([
                'login' => 'Wrong username or password',
            ])->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('/main');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',

        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('showLogin');
    }

    public function tiket(){
        $genres = genre::all();
        return view('main');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('showLogin');
    }
}
