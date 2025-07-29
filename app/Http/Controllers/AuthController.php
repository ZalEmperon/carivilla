<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function register(Request $request) {
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required|confirmed',
    //     ]);
    //     User::create([
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'role' => 'user',
    //     ]);
    //     return redirect('/auth');
    // }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['username' => 'Username salah/tidak ada.']);
        }
       if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }
        Auth::login($user);
        // dd(Auth::user());
        $request->session()->regenerate(); 
        $request->session()->regenerateToken();
        if (Auth::user()->role === 'admin') {
            return redirect('/admin-dashboard');
        }
        return redirect('/');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate(); 
        $request->session()->regenerateToken();
        return redirect('/');
    }
}