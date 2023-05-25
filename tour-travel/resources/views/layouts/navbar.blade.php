<nav class="main-header navbar navbar-expand">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars text-white"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt text-white"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display: inline-flex;">
                <img src="{{ asset('assets') }}/adminlte/dist/img/AdminLTELogo.png" style="opacity: .8; width: 25px;">
                <p style="margin-top: auto; margin-left: 5px;">{{ Auth::user()->email }}</p>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="{{ route('admin.logout') }}" class="dropdown-item dropdown-footer">Logout</a>
            </div>
        </li>
    </ul>
</nav>
