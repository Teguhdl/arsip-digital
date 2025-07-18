@extends('main.layout.master')

@section('content')

<section class="section">
  <div class="section-header">
            <h1>Manage User</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Data Master</a></div>
              <div class="breadcrumb-item">Manage User</div>
            </div>
          </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end mt-3 mr-4">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Username</th>
                                    <th>Nama User</th>
                                    <th>Akses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->nama_user }}</td>
                                        <td>{{ $user->akses }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                @if($users->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada user.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data user akan dihapus permanen!",
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
</script>

@endsection
