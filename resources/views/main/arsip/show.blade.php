@extends('main.layout.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Detail Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="{{ route('arsip.index') }}">Arsip</a></div>
      <div class="breadcrumb-item">Detail</div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row">
        {{-- Preview File --}}
        <div class="col-md-6">
          @if($arsip->file)
            @php $ext = pathinfo($arsip->file, PATHINFO_EXTENSION); @endphp
            <div class="text-center mb-3">
              <h5 class="font-weight-bold">Preview Arsip</h5>
            </div>
            <div class="border p-2 rounded shadow-sm bg-light text-center">
              @if(in_array($ext, ['pdf']))
                <embed src="{{ asset('storage/' . $arsip->file) }}" type="application/pdf" width="100%" height="500px" />
              @elseif(in_array($ext, ['jpg', 'jpeg', 'png']))
                <img src="{{ asset('storage/' . $arsip->file) }}" alt="Preview Arsip" class="img-fluid rounded shadow">
              @else
                <a href="{{ asset('storage/' . $arsip->file) }}" class="btn btn-outline-primary" target="_blank">Download File</a>
              @endif
            </div>
          @else
            <p class="text-muted">Tidak ada file arsip.</p>
          @endif
        </div>

        {{-- Informasi Arsip --}}
        <div class="col-md-6">
          <h5 class="mb-4 font-weight-bold">Informasi Arsip</h5>
          <dl class="row">
            <dt class="col-sm-4">Kode Arsip</dt>
            <dd class="col-sm-8">{{ $arsip->kode_arsip }}</dd>

            <dt class="col-sm-4">Judul</dt>
            <dd class="col-sm-8">{{ $arsip->judul }}</dd>

            <dt class="col-sm-4">Kategori</dt>
            <dd class="col-sm-8">{{ $arsip->kategori->nama_kategori ?? '-' }}</dd>

            <dt class="col-sm-4">Deskripsi</dt>
            <dd class="col-sm-8">{{ $arsip->deskripsi ?? '-' }}</dd>

            <dt class="col-sm-4">Tanggal Upload</dt>
            <dd class="col-sm-8">{{ $arsip->created_at->format('d-m-Y H:i') }}</dd>

            <dt class="col-sm-4">Diupload Oleh</dt>
            <dd class="col-sm-8">{{ $arsip->user->name ?? '-' }}</dd>
          </dl>

          {{-- QR Code --}}
          @if($arsip->file)
          <div class="mt-5 text-center">
            <h6 class="mb-2 font-weight-bold">QR Code Akses File</h6>
            <div class="d-flex justify-content-center">
              <div id="qr-code"></div>
            </div>
            <button id="download-qr" class="btn btn-outline-primary btn-sm mt-2">Download QR</button>
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="card-footer text-right">
      <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
  </div>
</section>

{{-- QRCode.js Library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const qrContainer = document.getElementById("qr-code");

    const qr = new QRCode(qrContainer, {
      text: "{{ $arsip->kode_arsip }}", // Bisa diganti ke URL file jika perlu
      width: 200,
      height: 200
    });

    document.getElementById('download-qr').addEventListener('click', function () {
      setTimeout(function () {
        const img = qrContainer.querySelector('img') || qrContainer.querySelector('canvas');
        if (img) {
          const link = document.createElement('a');
          link.href = img.src || img.toDataURL("image/png");
          link.download = 'qr_arsip_{{ $arsip->kode_arsip }}.png';
          link.click();
        }
      }, 500);
    });
  });
</script>
@endsection
