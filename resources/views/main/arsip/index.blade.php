@extends('main.layout.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1> Arsip</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data Arsip</a></div>
            <div class="breadcrumb-item"> Arsip</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end mt-3 mr-4">
                    <a href="{{ route('arsip.create') }}" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table-1">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Arsip</th>
                                    <th>Kategori</th>
                                    <th>File</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($arsip as $a)
                                <tr>
                                    <td>{{ $a->kode_arsip }}</td>
                                    <td>{{ $a->nama_arsip }}</td>
                                    <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
                                    <td>
                                        @if($a->file)
                                        <a href="{{ asset('storage/' . $a->file) }}" target="_blank">Lihat File</a>
                                        @else
                                        Tidak ada
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('arsip.show', $a->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('arsip.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('arsip.destroy', $a->id) }}" method="POST" style="display:inline-block">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        @endsection
