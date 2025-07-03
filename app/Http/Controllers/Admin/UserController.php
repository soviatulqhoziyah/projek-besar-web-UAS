<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // ✅ tambahkan ini
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'super_admin'])->paginate(10);
        return view('admin.user', compact('users'));
    }

    public function create()
    {
        return view('admin.tambah_user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email',
            'role'     => 'required|in:admin,super_admin',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(), //
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');

    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
        }

        $user->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }
}
