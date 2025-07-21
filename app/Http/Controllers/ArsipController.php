<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\KategoriArsip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::with('kategori')->get();
        return view('main.arsip.index', compact('arsip'));
    }

    public function create()
    {
        $kategori = KategoriArsip::all();
        $last = Arsip::orderBy('id', 'desc')->first();
        $nextId = $last ? $last->id + 1 : 1;
        $kode = 'ARS-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        return view('main.arsip.create', compact('kategori', 'kode'));
    }

   public function store(Request $request)
{
    $request->validate([
        'nama_arsip' => 'required',
        'deskripsi' => 'nullable',
        'kategori_arsip_id' => 'required',
        'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $file = $request->file('file');
    $filePath = $file->store('arsip', 'public');

    Arsip::create([
        'user_id' => $request->user_id,
        'kode_arsip' => $request->kode_arsip,
        'nama_arsip' => $request->nama_arsip,
        'deskripsi' => $request->deskripsi,
        'kategori_arsip_id' => $request->kategori_arsip_id,
        'file' => $filePath,
    ]);

    return redirect()->route('arsip.index')->with('success', 'Data arsip berhasil disimpan.');
}



    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategori = KategoriArsip::all();
        return view('main.arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);

        $request->validate([
            'nama_arsip' => 'required',
            'kategori_arsip_id' => 'required|exists:kategori_arsip,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xlsx,xls,jpg,jpeg,png|max:2048',
        ]);

        $filename = $arsip->file;
        if ($request->hasFile('file')) {
            $filename = $request->file('file')->store('arsip', 'public');
        }

        $arsip->update([
            'nama_arsip' => $request->nama_arsip,
            'kategori_arsip_id' => $request->kategori_arsip_id,
            'deskripsi' => $request->deskripsi,
            'file' => $filename,
        ]);

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil diperbarui');
    }

    public function show($id)
    {
        $arsip = Arsip::with('kategori')->findOrFail($id);
        return view('main.arsip.show', compact('arsip'));
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);
        $arsip->delete();
        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus');
    }
}
