<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arsip;
use App\Models\KategoriArsip;

class ScanController extends Controller
{
    public function index()
    {
        return view('main.scan.index');
    }

    public function process(Request $request)
    {
        $qrData = $request->input('qr_data');
        $kategori = KategoriArsip::where('kode_kategori', $qrData)->first();
        if ($kategori) {
            return redirect()->route('kategori-arsip.show', $kategori->id);
        }

        $arsip = Arsip::where('kode_arsip', $qrData)->first();
        if ($arsip) {
            return redirect()->route('arsip.show', $arsip->id);
        }

        return redirect()->route('scan.index')->with('error', 'Data tidak ditemukan.');
    }
}
