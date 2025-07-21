<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = UserModel::all();
        return view('main.user.index', compact('users'));
    }

    public function create()
    {
        return view('main.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'   => 'required|unique:user_login,username',
            'nama_user'  => 'required|string',
            'password'   => 'required|string|min:6',
            'akses'      => 'required|in:Administrator,Petugas,User',
        ]);

        UserModel::create([
            'username'  => $request->username,
            'nama_user' => $request->nama_user,
            'password'  => md5($request->password),
            'akses'     => $request->akses,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        return view('main.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $request->validate([
            'username'   => 'required|unique:user_login,username,' . $id,
            'nama_user'  => 'required|string',
            'password'   => 'nullable|string|min:6',
            'akses'      => 'required|in:Administrator,Petugas,User',
        ]);

        $user->username  = $request->username;
        $user->nama_user = $request->nama_user;
        $user->akses     = $request->akses;

        if ($request->filled('password')) {
            $user->password = md5($request->password); // atau Hash::make
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function showChangePasswordForm()
    {
        $userId = session('user.id');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda belum login.');
        }

        $user = UserModel::findOrFail($userId);
        return view('main.user.gantipw', compact('user'));
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $userId = session('user.id');

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Anda belum login.');
        }

        $user = UserModel::findOrFail($userId);

        if ($user->password !== md5($request->current_password)) {
            return redirect()->back()->with('error', 'Password lama salah.');
        }

        $user->password = md5($request->new_password);
        $user->save();

        session()->forget('user');

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan login kembali dengan password baru.');
    }
}
