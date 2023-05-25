<nav class="main-header navbar navbar-expand">
    {{-- <!-- Left navbar links --> --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li> --}}
    </ul>

    {{-- <!-- Right navbar links --> --}}
    <ul class="navbar-nav ml-auto">
        {{-- <!-- Navbar Search --> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt text-white"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex;">
                <img src="{{ asset('assets') }}/adminlte/dist/img/AdminLTELogo.png" style="opacity: .8; width: 25px;">
                <!-- {{-- <p style="margin-top: auto; margin-left: 5px;">{{ Auth::user()->nama }}</p> --}} -->
            </a>
        </li>
    </ul>
</nav>
