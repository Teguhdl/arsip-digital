@extends('main.layout.master')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Scan QR Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item">Scan QR Arsip</div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <h4>Gunakan Kamera untuk Scan QR</h4>
    </div>
    <div class="card-body text-center">
      <div id="reader" style="width: 300px; margin: auto;"></div>
      <form method="POST" action="{{ route('scan.process') }}" id="scanForm">
        @csrf
        <input type="hidden" name="qr_data" id="qr_data">
      </form>
    </div>
  </div>
</section>

<script src="https://unpkg.com/html5-qrcode"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        document.getElementById('qr_data').value = decodedText;
        document.getElementById('scanForm').submit();
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess);
</script>

@endsection
