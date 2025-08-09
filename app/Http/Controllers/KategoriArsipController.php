<?php


namespace App\Http\Controllers;

use App\Models\KategoriArsip;
use App\Models\Arsip;
use Illuminate\Http\Request;

class KategoriArsipController extends Controller
{
    public function index()
    {
        $kategori = KategoriArsip::with('induk')->get();
        return view('main.kategori_arsip.index', compact('kategori'));
    }

    public function create()
    {
        $kategoriUtama = KategoriArsip::whereNull('induk_id')->get();

        $last = KategoriArsip::orderBy('id', 'desc')->first();
        $nextId = $last ? $last->id + 1 : 1;
        $kodeBaru = 'KTG-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);

        return view('main.kategori_arsip.create', compact('kategoriUtama', 'kodeBaru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kategori' => 'required|unique:kategori_arsip,kode_kategori',
            'nama_kategori' => 'required|string|max:255',
        ]);

        KategoriArsip::create($request->all());
        return redirect()->route('kategori-arsip.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriArsip::findOrFail($id);
        $kategoriUtama = KategoriArsip::whereNull('induk_id')->where('id', '!=', $id)->get();
        return view('main.kategori_arsip.edit', compact('kategori', 'kategoriUtama'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'induk_id' => 'nullable|exists:kategori_arsip,id',
        ]);

        $kategori = KategoriArsip::findOrFail($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->induk_id = $request->induk_id;
        $kategori->save();

        return redirect()->route('kategori-arsip.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = KategoriArsip::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori-arsip.index')->with('success', 'Kategori berhasil dihapus');
    }

    public function show($id)
    {
        $kategori = KategoriArsip::with('anak')->findOrFail($id);
        $arsip = Arsip::where('kategori_arsip_id', $id)->with('kategori')->get();

        return view('main.kategori_arsip.show', compact('kategori', 'arsip'));
    }
}
