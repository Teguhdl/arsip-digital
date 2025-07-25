<?php

namespace App\Http\Controllers;
use App\Models\UserModel;
use App\Models\KategoriArsip;
use App\Models\Arsip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahPetugas = UserModel::where('akses', 'Petugas')->count();
        $jumlahUser = UserModel::where('akses', 'User')->count();
        $jumlahKategori = KategoriArsip::count();
        $jumlahArsip = Arsip::count();

        return view('main.dashboard', compact(
            'jumlahPetugas',
            'jumlahUser',
            'jumlahKategori',
            'jumlahArsip'
        ));
    }
}
