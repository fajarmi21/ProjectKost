<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Daftar Fasilitas Tambahan')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Clients Section ======= -->
    <section id="portfolio" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="raw" style="border: 5; border-style:solid; margin-top: 100px;">
                <h5 style="font-size: 1.25rem; font-weight: bold; color: #000000;">Daftar Fasilitas Tambahan</h5>
                <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #000000;letter-spacing: 0.03rem; margin-bottom: 10px;"><b>Kami juga menyediakan fasilitas tambahan yang bisa Anda Pakai</b></p>
            </div>
            <div class="row">
                @foreach($fas as $data)
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="card">
                                <img src="{{url('/images')}}/{{$data->foto}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data->fasilitas}}</h5>
                                    <p class="card-text">{{$data->harga}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Clients Section -->
</main><!-- End #main -->
@endsection