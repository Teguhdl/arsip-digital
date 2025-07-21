@extends('main.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Tambah Arsip</h1>
    </div>
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header">
                    <h4>Form Arsip</h4>
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
                    <form method="POST" action="{{ route('arsip.store') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label for="petugas">Petugas</label>
                            <input type="text" class="form-control" value="{{ session('user.nama_user') }}" readonly>
                            <input type="hidden" name="user_id" value="{{ session('user.id') }}">
                        </div>

                        <div class="form-group">
                            <label for="kode_arsip">Kode Arsip</label>
                            <input type="text" name="kode_arsip" id="kode_arsip" class="form-control" value="{{ $kode }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nama_arsip">Nama Arsip</label>
                            <input type="text" name="nama_arsip" id="nama_arsip" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="kategori_arsip_id">Kategori Arsip</label>
                            <select name="kategori_arsip_id" id="kategori_arsip_id" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategori as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }} ({{ $kategori->kode_kategori }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="file">Upload File</label>
                            <input type="file" name="file" id="file" class="form-control-file">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection