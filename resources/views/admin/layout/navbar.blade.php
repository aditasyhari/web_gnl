<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="index.html">
            <h2 class="tm-site-title mb-0">Glenmore Natural Life</h2>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                        <i class="fas fa-tachometer-alt "></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('admin/product*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/admin/product') }}">
                        <i class="fas fa-shopping-cart"></i>
                        Produk
                    </a>
                </li>

                <li class="nav-item dropdown {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span>
                            Settings <i class="fas fa-angle-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('admin/settings/akun') }}">Akun</a>
                        <a class="dropdown-item" href="{{ url('admin/settings/socmed') }}">Sosmed</a>
                        <a class="dropdown-item" href="{{ url('admin/settings/banner') }}">Banner</a>
                        <a class="dropdown-item" href="{{ url('admin/settings/faq') }}">FAQ</a>
                        <a class="dropdown-item" href="{{ url('admin/settings/about') }}">About</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('logout') }}">
                        <b>Logout</b>
                    </a>
                </li>

            </ul>
        </div>
    </div>

</nav>