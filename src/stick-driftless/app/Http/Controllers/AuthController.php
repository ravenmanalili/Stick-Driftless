<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister ()
    {
        return view('auth.register');
    }

    public function showLogin ()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => 2,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $request->remember)) {
            // Authentication passed
            return redirect()->route('home');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
