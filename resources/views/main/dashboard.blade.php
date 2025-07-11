@extends('main.layout.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    {{-- Filter Bulan dan Tahun --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="{{ route('dashboard') }}">
                <div class="form-row align-items-end">
                    <div class="col">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                           
                        </select>
                    </div>
                    <div class="col">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Statistik Kas --}}
    <div class="row">
        {{-- Card Kas Masuk --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Kas Masuk</h4>
                    </div>
                    <div class="card-body"  style="font-size: 15px">
                       
                    </div>
                </div>
            </div>
        </div>

        {{-- Card Kas Keluar --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Data Kas Keluar</h4>
                    </div>
                    <div class="card-body"  style="font-size: 15px">
                        Rp. 000
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Kas Masuk (Rupiah) --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kas Masuk (Rupiah)</h4>
                    </div>
                    <div class="card-body"  style="font-size: 15px">
                       Rp. 000
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Kas Keluar (Rupiah) --}}
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Kas Keluar (Rupiah)</h4>
                    </div>
                    <div class="card-body"  style="font-size: 15px">
                        000
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Grafik Kas Masuk dan Keluar --}}
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Kas Masuk & Kas Keluar</h4>
            </div>
            <div class="card-body">
                <canvas id="grafikKas" height="100"></canvas>
            </div>
        </div>
    </div>
    </div>

</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->


@endsection
