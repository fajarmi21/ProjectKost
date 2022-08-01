<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Data Booking')
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
            <h2>Data Kost</h2>

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
                            <h5 class="mt-1">Fasilitas</h5>
                            <p>{{$kost->fasilitas}}</p>
                            <h5>Keterangan</h5>
                            <p>{{$kost->keterangan}}</p>
                            <h5>Kategori</h5>
                            <p>{{$kost->kategori_kost}}</p>
                            <h5>Biaya Sewa</h5>
                            <p>{{$kost->harga}}</p>
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
                                                    <img src="{{url('/images')}}/{{$kost->fotokost}}" id="fotokost"
                                                        alt="" style=" width:100%;">
                                                </div>
                                                <div class="swiper-slide">
                                                    <img src="{{url('/images')}}/{{$kost->fotokost2}}" id="fotokost2"
                                                        alt="" style="width:100%;">
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