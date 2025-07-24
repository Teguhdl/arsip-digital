@extends('main.layout.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('arsip.index') }}">Arsip</a></div>
      <div class="breadcrumb-item">Edit</div>
    </div>
  </div>

  <div class="card">
    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="card-body">
        {{-- Nama Arsip --}}
        <div class="form-group">
          <label for="nama_arsip">Nama Arsip</label>
          <input type="text" name="nama_arsip" class="form-control @error('nama_arsip') is-invalid @enderror" value="{{ old('nama_arsip', $arsip->judul) }}" required>
          @error('nama_arsip')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Kategori --}}
        <div class="form-group">
          <label for="kategori_arsip_id">Kategori</label>
          <select name="kategori_arsip_id" class="form-control @error('kategori_arsip_id') is-invalid @enderror" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $item)
              <option value="{{ $item->id }}" {{ $item->id == $arsip->kategori_arsip_id ? 'selected' : '' }}>
                {{ $item->nama_kategori }}
              </option>
            @endforeach
          </select>
          @error('kategori_arsip_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
        </div>

        {{-- File Upload --}}
        <div class="form-group">
          <label for="file">Ganti File Arsip (opsional)</label>
          <input type="file" name="file" class="form-control-file @error('file') is-invalid @enderror">
          @error('file')
            <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror

          @if($arsip->file)
            <p class="mt-2">File saat ini: <a href="{{ asset('storage/' . $arsip->file) }}" target="_blank">Lihat File</a></p>
          @endif
        </div>
      </div>

      <div class="card-footer text-right">
        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</section>
@endsection
