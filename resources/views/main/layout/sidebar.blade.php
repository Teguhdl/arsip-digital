<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/home')}}">Pencatatan Arsip</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home')}}">AWH</a>
        </div>

         @php
            $akses = session('user.akses', []);
        @endphp

        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="{{ url('/home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @if(in_array('master', $akses))
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Akun</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/coa')}}">COA</a></li>
                    <li><a class="nav-link" href="{{ url('/user')}}">User Akun</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Master Transaksi</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/kat-transaksi')}}">Kategori Transaksi</a></li>
                    <li><a class="nav-link" href="{{ url('/transaksi')}}">Transaksi</a></li>
                    <li><a class="nav-link" href="{{ url('/mekanisme-pembayaran')}}">Mekanisme Pembayaran</a></li>
                </ul>
            </li>
            <!-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Vendor</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/pemasok')}}">Pemasok</a></li>
                    <li><a class="nav-link" href="{{ url('/mitra')}}">Mitra</a></li>
                </ul>
            </li> -->
            @endif

            @if(in_array('transaksi', $akses))
            <li class="menu-header">Transaksi</li>
            <li class="nav-item dropdown">
                <a href="{{ url('/kas?tipe=masuk')}}" class="nav-link"><i class="fas fa-fire"></i><span>Kas Masuk</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ url('/kas?tipe=keluar')}}" class="nav-link"><i class="fas fa-fire"></i><span>Kas Keluar</span></a>
            </li>
            @endif

            @if(in_array('laporan', $akses))
            <li class="menu-header">Laporan</li>
            <li class="nav-item dropdown">
                <a href="{{ url('/kas/jurnal')}}" class="nav-link"><i class="fas fa-fire"></i><span>Jurnal Umum</span></a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ url('/kas/laporan')}}" class="nav-link"><i class="fas fa-fire"></i><span>Laporan Kas Kecil</span></a>
            </li>
             @endif
        </ul>
    </aside>
</div>