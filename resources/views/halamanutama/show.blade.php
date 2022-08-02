<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Data Kamar')
<!-- section untuk content  -->
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Detail</li>
            </ol>
            <h2>Data Kamar</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="row">

                    <div class="col-md-12 col-lg-8 entries">
                        @csrf
                        <article class="entry">
                            <h5 class="mt-1">Fasilitas Kamar</h5>
                            <p>{{$kost->fasilitas}}</p>
                            <h5>Keterangan</h5>
                            <p>{{$kost->keterangan}}</p>
                            <h5>Kategori</h5>
                            <p>{{$kost->kategori_kost}}</p>
                            <h5>Biaya Sewa</h5>
                            <p>{{$kost->harga}}</p>
                            <h5>Fasilitas Umum</h5>
                            <li>WiFi</li>
                            <li>R. Tamu</li>
                            <li>R. Jemur</li>
                            <h5>Fasilitas Parkir</h5>
                            <li>Parkir Mobil</li>
                            <li>Parkir Motor</li>
                            <h5>Fasilitas kamar mandi</h5>
                            <p>Kamar mandi luar, kloset duduk</p>
                            <h5>Peraturan:</h5>
                            <li>Tamu menginap dikenakan biaya</li>
                            <li>Tambah biaya untuk alat elektronik</li>
                            <li>Lawan jenis dilarang ke kamar</li>
                            <li>Dilarang merokok di kamar</li>

                        </article>
                        <a href="/booking/pesan/{{$kost->id}}" class="col-md-12 btn btn-primary">Booking</a>
                    </div><!-- End blog entries list -->
                    <div class="col-md-12 col-lg-4 entries">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">{{$kost->nama_kost}}</h4>
                                <section id="portfolio" class="portfolio-details">
                                    <div class="container" data-aos="fade-up">
                                        <div class="portfolio-details-slider swiper-container">
                                            <div class="swiper-wrapper align-items-center">
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost}}" id="fotokost" alt="" style=" width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost2}}" id="fotokost2" alt="" style="width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost3}}" id="fotokost3" alt="" style="width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost4}}" id="fotokost4" alt="" style="width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost5}}" id="fotokost5" alt="" style="width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost6}}" id="fotokost6" alt="" style="width:100%;">
                                                </div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            {{-- <div class="card-footer">
                                <h4 class="mb-3">Fasilitas Tambahan</h4>
                                <section id="portfolio" class="portfolio-details">
                                    <div class="container" data-aos="fade-up">
                                        <div class="portfolio-details-slider swiper-container">
                                            <div class="swiper-wrapper align-items-center">
                                                @foreach ($fasilitas as $data)
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$data->foto}}" alt="Tidak ada foto">
                            <span class="title">{{$data->fasilitas}} - {{$data->harga}}</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
    </section>
    </div> --}}
    </div>
    </div>
    </div>
    </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection
@section('script')
<script>
    function previewbukti_dp(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewbukti_dp').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection