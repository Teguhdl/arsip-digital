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
            @if(in_array('admin', $akses))
            <li class="menu-header">Data Master</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Akun</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/')}}">Ganti Password</a></li>
                    <li><a class="nav-link" href="{{ url('/')}}">Manage Akun</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file"></i> <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ url('/')}}">Kategori Arsip</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </aside>
</div>