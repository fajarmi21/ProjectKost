    <!-- menampilkan header -->
    @include('layouts.header')
    <!-- menampilkan navbar -->
    @include('layouts.navbar')
    <!-- menampilkan sidebar -->
    @include('layouts.sidebar')
    <!-- menampilkan content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- menampilkan footer -->
    @include('layouts.footer')
    @yield('script')

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
