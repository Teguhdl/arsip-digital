@extends('main.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Kategori Arsip</h1>
    </div>
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h4>Form Kategori Arsip</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('kategori-arsip.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="kode_kategori">Kode Kategori</label>
                            <input type="text" name="kode_kategori" id="kode_kategori" class="form-control" value="{{ $kodeBaru }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="induk_id">Induk Kategori <small class="text-muted">(biarkan kosong jika ini kategori utama)</small></label>
                            <select name="induk_id" id="induk_id" class="form-control">
                                <option value="">-- Tidak ada (Kategori Utama) --</option>
                                @foreach ($kategoriUtama as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }} ({{ $kategori->kode_kategori }})</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kategori-arsip.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection