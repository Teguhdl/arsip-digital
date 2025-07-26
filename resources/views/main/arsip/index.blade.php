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
    @php
            $akses = session('user.akses', []);
        @endphp
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
                @if($akses === 'Administrator' || $akses === 'Petugas')
                <a href="{{ route('arsip.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('arsip.destroy', $a->id) }}" method="POST" id="delete-form-{{ $a->id }}" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $a->id }}, '{{ $a->judul }}')">Hapus</button>
                </form>
                @endif

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

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function confirmDelete(id, name) {
    Swal.fire({
      title: 'Hapus arsip?',
      text: `Data arsip "${name}" akan dihapus secara permanen.`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }
</script>

@endsection
