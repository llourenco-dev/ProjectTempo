<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function getLogin(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful'
                ]);
            }
            
            return redirect()->intended('/dashboard');
        }

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 422);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
