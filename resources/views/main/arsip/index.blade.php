@extends('main.layout.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Data Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Arsip</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header justify-content-between">
      <h4>Daftar Arsip</h4>
      <a href="{{ route('arsip.create') }}" class="btn btn-primary">Tambah Arsip</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Arsip</th>
              <th>Nama Arsip</th>
              <th>Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse($arsip as $index => $a)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $a->kode_arsip }}</td>
              <td>{{ $a->judul }}</td>
              <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
              <td>
                <a href="{{ route('arsip.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="text-center">Belum ada arsip.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection
