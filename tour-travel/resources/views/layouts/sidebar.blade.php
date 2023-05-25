<aside class="main-sidebar sidebar-light-primary elevation-4">

    <a class="brand-link text-white">
        <img src="/assets/logo.png" alt="Pens Logo" class="brand-image" style="float: none; margin-left: 1rem;">
        <b class="brand-text text-dark">Tour & Travel</b>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kategori-wisata" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Kategori Wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/wisata" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/paket-wisata" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Paket Wisata</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/transaksi" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Data Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="user-panel mt-5 pb-3 mb-3 d-flex">
        <!-- <div class="user-panel align-bottom d-flex"> -->
            <div class="image">
                <img src="{{ asset('assets/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="img-circle elevation-2" style="opacity: .8">
            </div>
            <div class="info">
                <p style="margin-top: auto; margin-left: 5px;">{{ Auth::user()->email }}</p>
            </div>
        </div> 
    </div>
</aside>
