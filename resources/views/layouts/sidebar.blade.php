<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{url('/')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Kost Bu Tik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/profil/{{Auth::user()->id}}" class="d-block"> {{Auth::user()['name']}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        @auth
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @if(Auth::user()->role_id == '1')
                {{-- <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/indexpengunjung" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Pengunjung
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/penyewa" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Pelanggan
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/pemilik" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Pemilik
                        </p>
                    </a>
                </li> --}}

                <li class="nav-item">
                    <a href="/booking" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Booking
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pembayaran" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kost" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Kamar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/fasilitas" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Fasilitas
                        </p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role_id == '6')
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pembayaran" class="nav-link">
                        <i class="nav-icon fas fa-check"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/komplain" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Komplain
                        </p>
                    </a>
                </li>
                @endif
                @if(Auth::user()->role_id == '5')
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/updateprofil" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kost" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Kamar
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/komplain" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Data Komplain
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" onclick=" event.preventDefault(); document.getElementById('formLogout').submit();">
                        <i class="nav-icon fas fa-reply"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
                <form id="formLogout" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
            </ul>
        </nav>
        @else

        <a href="{{ route('login') }}" class="get-started-btn scrollto">Login</a>

        @endauth


    </div>
</aside>
