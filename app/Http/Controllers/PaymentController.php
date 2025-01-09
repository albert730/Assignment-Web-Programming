<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'gender' => 'required|in:Male,Female',
            'fields_of_work' => 'required|array|min:3',
            'fields_of_work.*' => 'string',
            'linkedin_username' => 'required|url|regex:/https:\/\/www\.linkedin\.com\/in\/.+/',
            'mobile_number' => 'required|digits_between:10,15',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'fields_of_work' => json_encode($request->fields_of_work),
            'linkedin_username' => $request->linkedin_username,
            'mobile_number' => $request->mobile_number,
            'registration_fee' => rand(100000, 125000),
        ]);

        Auth::login($user);

        return redirect()->route('profile');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('profile');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
