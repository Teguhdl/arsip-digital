@extends('main.layout.master')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Detail Kategori Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('kategori-arsip.index') }}">Kategori Arsip</a></div>
      <div class="breadcrumb-item">{{ $kategori->nama_kategori }}</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4>Informasi Kategori</h4>
    </div>
    <div class="card-body">
      <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
      <p><strong>Kode Kategori:</strong> {{ $kategori->kode_kategori }}</p>
      <p><strong>Kategori Induk:</strong> {{ $kategori->induk ? $kategori->induk->nama_kategori : '-' }}</p>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-header justify-content-between">
      <h4>Daftar Arsip di Kategori Ini</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Arsip</th>
              <th>Judul Arsip</th>
              <th>Kategori</th>
            </tr>
          </thead>
          <tbody>
            @forelse($arsip as $index => $a)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $a->kode_arsip }}</td>
              <td>{{ $a->judul }}</td>
              <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">Belum ada arsip di kategori ini.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection
