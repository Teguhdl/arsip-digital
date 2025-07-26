@extends('main.layout.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Riwayat Unduhan Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item active">Riwayat Unduhan</div>
    </div>
  </div>

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Arsip</th>
            <th>Judul Arsip</th>
            <th>Nama Pengguna</th>
            <th>IP Address</th>
            <th>Waktu Unduh</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($histories as $i => $history)
          <tr>
            <td>{{ ($histories->currentPage() - 1) * $histories->perPage() + $i + 1 }}</td>
            <td>{{ $history->arsip->kode_arsip ?? '-' }}</td>
            <td>{{ $history->arsip->judul ?? '-' }}</td>
            <td>{{ $history->user->nama_user ?? '-' }}</td>
            <td>{{ $history->ip_address }}</td>
            <td>{{ \Carbon\Carbon::parse($history->downloaded_at)->format('d-m-Y H:i') }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center">Belum ada data riwayat unduhan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>

      <div class="mt-3">
        {{ $histories->links() }} {{-- pagination --}}
      </div>
    </div>
  </div>
</section>
@endsection
