<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/">Kost Bu Tik<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->
      @auth
      <nav id="navbar" class="navbar order-last order-lg-0">

        @if(Auth::user()->role_id == '4')
        <ul>
          {{-- <li><a class="nav-link scrollto" href="/">Beranda</a></li> --}}
          <!-- <li><a class="nav-link scrollto" href="/hasilseleksi">Daftar Kost</a></li> -->
          {{-- <li><a class="nav-link scrollto" href="/kost">Daftar Kamar</a></li>
          <li><a class="nav-link scrollto" href="/fas">Daftar Fasilitas</a></li> --}}
        </ul>
        @endif
        @if(Auth::user()->role_id == '6' && Auth::user()->penyewa->status == 'belum')
        <ul>
          {{-- <li><a class="nav-link scrollto" href="/">Beranda</a></li> --}}
          <!-- <li><a class="nav-link scrollto" href="/hasilseleksi">Daftar Kost</a></li> -->
          {{-- <li><a class="nav-link scrollto" href="/kost">Daftar Kamar</a></li>
          <li><a class="nav-link scrollto" href="/fas">Daftar Fasilitas</a></li> --}}
        </ul>
        @endif
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();" class="get-started-btn scrollto">
          {{ __('Log out') }}
        </x-dropdown-link>
      </form>
      @else
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="/">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          {{-- <li><a class="nav-link scrollto" href="/daftarkost">Daftar Kamar</a></li>
          <li><a class="nav-link scrollto" href="/fas">Daftar Fasilitas</a></li> --}}
        </ul>
      </nav>
      <a href="{{ route('login') }}" class="get-started-btn scrollto " style="border-radius:4px 0 0 4px;">Login</a>
      <a href="{{ route('register') }}" class="get-started-btn scrollto" style="margin-left: 0px; background: #111; color:#e03a3c; border-radius:0 4px 4px 0;">Register</a>

      @endauth
    </div>
  </header>
  <!-- End Header -->