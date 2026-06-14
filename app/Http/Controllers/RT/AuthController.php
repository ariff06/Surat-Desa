<?php

namespace App\Http\Controllers\RT;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('rt.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('rt')->attempt($credentials)) {
            $user = Auth::guard('rt')->user();

            if (!$user->is_active) {
                Auth::guard('rt')->logout();
                return back()->withErrors([
                    'email' => 'Akun RT ini telah dinonaktifkan. Hubungi admin desa untuk informasi lebih lanjut.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->route('rt.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('rt')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('rt.login');
    }
}