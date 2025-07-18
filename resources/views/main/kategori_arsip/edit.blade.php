@extends('main.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Kategori Arsip</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Kategori</h4>
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

                    <form method="POST" action="{{ route('kategori-arsip.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $kategori->nama_kategori }}" required>
                        </div>

                        <div class="form-group">
                            <label for="kode">Kode Kategori</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="{{ $kategori->kode_kategori }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="induk_id">Kategori Induk (Opsional)</label>
                            <select name="induk_id" id="induk_id" class="form-control">
                                <option value="">-- Tidak Ada (Parent) --</option>
                                @foreach ($kategoriUtama as $parent)
                                    <option value="{{ $parent->id }}" {{ $kategori->induk_id == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="{{ route('kategori-arsip.index') }}" class="btn btn-secondary">Batal</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
