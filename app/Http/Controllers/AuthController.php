<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }   

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
    
        $user = UserModel::where('username', $request->username)->first();
    
        if ($user && $user->password === md5($request->password)) {
            $user->touch(); 
            session(['user' => [
                'id' => $user->id,
                'nama_user' => $user->nama_user,
                'last_update' => $user->updated_at,
                'akses' => $user->akses
            ]]);
            
            return redirect()->intended('home')->with('success', 'Login berhasil!');
        }
    
        return redirect()->back()->with('error', 'Username atau Password Anda salah.');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
