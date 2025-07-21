@extends('main.layout.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Edit User</h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit User</h4>
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

                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_user">Nama User</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control" value="{{ old('nama_user', $user->nama_user) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password Baru <small>(Biarkan kosong jika tidak ingin mengganti)</small></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Minimal 6 karakter">
                        </div>

                        <div class="form-group">
                            <label for="akses">Akses</label>
                            <select name="akses" id="akses" class="form-control" required>
                                <option value="">-- Pilih Akses --</option>
                                <option value="Administrator" {{ old('akses', $user->akses) == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                <option value="Petugas" {{ old('akses', $user->akses) == 'Petugas' ? 'selected' : '' }}>Petugas</option>
                                <option value="User" {{ old('akses', $user->akses) == 'User' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Perbarui</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
