<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user(); // ✅ ambil data user yang login

        // Redirect berdasarkan role
        if (in_array($user->role, ['admin', 'super_admin'])) {
            return redirect()->route('admin.data_events');
        }

        Auth::logout(); // kalau role tidak diizinkan
        return back()->withErrors(['login' => 'Akses ditolak untuk role: ' . $user->role]);
    }

    return back()->withErrors(['login' => 'Email atau password salah']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
