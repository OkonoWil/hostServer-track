<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $user = User::where('email', $validatedData['email'])->get()->first();
        if ($user) {
            if (!Hash::check($validatedData['password'], $user->password)) {
                return redirect()->back()->withErrors(['password' => 'Passwords invalid']);
            }
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('/servers');
        } else {
            return redirect()->back()->withErrors(['email' => 'Aucun utilisateur avec cette email']);
        }
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        $user = new User(
            array_merge(
                $validatedData,
                ['password' => Hash::make($validatedData['password'])]
            )
        );
        $user->save();
        Auth::login($user);
        return redirect('/servers');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('getLogin');
    }
}
