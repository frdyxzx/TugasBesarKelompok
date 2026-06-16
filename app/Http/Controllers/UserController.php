<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['roles', 'cabang'])->latest()->get();

        return view('owner.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('name', '!=', 'owner')->get();
        $cabangs = Cabang::all();

        return view('owner.user.create', compact('roles', 'cabangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = User::create([
            'cabang_id' => $request->cabang_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = Role::where('name', '!=', 'owner')->get();
        $cabangs = Cabang::all();

        return view('owner.user.edit', compact('user', 'roles', 'cabangs'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
        ]);

        $user->update([
            'cabang_id' => $request->cabang_id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('owner')) {
            return redirect()->route('users.index')->with('error', 'Akun owner tidak boleh dihapus.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Data pegawai berhasil dihapus.');
    }
}
