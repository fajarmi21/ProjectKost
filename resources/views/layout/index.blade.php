<!-- menampilkan header  -->
@include('layout.header')
<!-- menampilkan navbar  -->
@include('layout.navbar')
<!-- menampilkan content  -->
@yield('content')
<!-- menampilkan footer  -->
@include('layout.footer')
@yield('script')

@include('sweetalert::alert')