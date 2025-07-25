@extends('main.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        {{-- Card Petugas --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Petugas</h4>
                    </div>
                    <div class="card-body" style="font-size: 15px">
                        {{ $jumlahPetugas }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Card User --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah User</h4>
                    </div>
                    <div class="card-body" style="font-size: 15px">
                        {{ $jumlahUser }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Kategori Arsip --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Kategori Arsip</h4>
                    </div>
                    <div class="card-body" style="font-size: 15px">
                        {{ $jumlahKategori }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Data Arsip --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Jumlah Data Arsip</h4>
                    </div>
                    <div class="card-body" style="font-size: 15px">
                        {{ $jumlahArsip }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection