<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view("login");
    }

    public function register() {
        return view("register");
    }

    public function home() {
        return view("home");
    }

    public function storeRegister(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255', 
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Successfull, Please Login');

        return redirect('/login')->with('success', 'Registration Successfull, Please Login');
    }

    public function authenticate(Request $request) {

        $validatedData = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            
            return redirect()->intended('/post');
        }

        return back()->with("loginError", "Incorect email or password");
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
