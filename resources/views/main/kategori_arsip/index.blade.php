@extends('main.layout.master')

@section('content')

<section class="section">
  <div class="section-header">
    <h1>Kategori Arsip</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Data Master</a></div>
      <div class="breadcrumb-item">Kategori Arsip</div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="d-flex justify-content-end mt-3 mr-4">
          <a href="{{ route('kategori-arsip.create') }}" class="btn btn-primary">Tambah Kategori</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="table-1">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th>Nama Kategori</th>
                  <th>Kode Kategori</th>
                  <th>Kategori Induk</th>
                  <th>QR Code</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse($kategori as $index => $item)
                <tr>
                  <td class="text-center">{{ $index + 1 }}</td>
                  <td>{{ $item->nama_kategori }}</td>
                  <td>{{ $item->kode_kategori }}</td>
                  <td>{{ $item->induk ? $item->induk->nama_kategori : '-' }}</td>
                  <td>
                    <div id="qrcode-{{ $item->id }}"></div>
                    <script>
                      new QRCode(document.getElementById("qrcode-{{ $item->id }}"), {
                        text: "{{ $item->kode_kategori }}",
                        width: 64,
                        height: 64
                      });
                    </script>
                  </td>
                  <td>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#qrModal-{{ $item->id }}">Lihat QR</button>
                    <a href="{{ route('kategori-arsip.show', $item->id) }}" class="btn btn-warning btn-sm">Detail</a>
                    <a href="{{ route('kategori-arsip.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('kategori-arsip.destroy', $item->id) }}" method="POST" id="delete-form-{{ $item->id }}" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">Delete</button>
                    </form>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="6" class="text-center">Belum ada kategori arsip.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@foreach($kategori as $item)
<div class="modal fade" id="qrModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel{{ $item->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 rounded-lg shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="qrModalLabel{{ $item->id }}">QR Kategori Arsip</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <p class=" mb-3">Kode: <strong>{{ $item->nama_kategori }}</strong></p>
        
        <!-- Wrapper agar QR benar-benar di tengah -->
        <div class="d-flex justify-content-center mb-3">
          <div id="qrcode-modal-{{ $item->id }}" class="bg-white rounded shadow-sm p-3"></div>
        </div>

        <button class="btn btn-success px-4" onclick="downloadQR({{ $item->id }}, '{{ $item->kode_kategori }}')">
          <i class="fas fa-download mr-1"></i> Download QR
        </button>
      </div>
    </div>
  </div>
</div>
@endforeach


<!-- === Script untuk Generate & Download QR Modal === -->
<script>
  function confirmDelete(id) {
    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data kategori akan dihapus permanen!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }

  function downloadQR(id, filename) {
    const qrCanvas = document.querySelector('#qrcode-modal-' + id + ' canvas');
    if (qrCanvas) {
      const link = document.createElement('a');
      link.href = qrCanvas.toDataURL("image/png");
      link.download = filename + ".png";
      link.click();
    } else {
      Swal.fire('Gagal', 'QR Code belum dimuat.', 'error');
    }
  }

  // Generate semua QR untuk modal
  @foreach($kategori as $item)
    new QRCode(document.getElementById("qrcode-modal-{{ $item->id }}"), {
      text: "{{ $item->kode_kategori }}",
      width: 200,
      height: 200
    });
  @endforeach
</script>

@endsection
