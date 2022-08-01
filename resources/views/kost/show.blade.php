<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Kamar')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5">
                    <div class="project-info-box mt-0" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <h3>Detail Kamar</h3>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Nama Kamar : </b>{{$kost->nama_kost}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Fasilitas : </b>{{$kost->fasilitas}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Kategori : </b>{{$kost->kategori_kost}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Harga Sewa : </b>Rp. {{$kost->harga}}</p>
                        <!-- <p class="mb-0"><b>Budget:</b> $500</p> -->
                    </div><!-- / project-info-box -->

                    <!-- <div class="project-info-box mt-0 mb-0">
                        <p class="mb-0">
                            <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
                            <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
                            <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
                            <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
                            <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
                        </p>
                    </div>/ project-info-box -->
                </div><!-- / column -->

                <div class="col-md-7">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @if (isset($kost->fotokost2))
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            @elseif (isset($kost->fotokost3))
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            @endif
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{url('/images')}}/{{$kost->fotokost}}" class="d-block w-100" alt="..." style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                            </div>
                            @if (isset($kost->fotokost2))
                            <div class="carousel-item">
                                <img src="{{url('/images')}}/{{$kost->fotokost2}}" class="d-block w-100" alt="..." style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                            </div>
                            @elseif (isset($kost->fotokost3))
                            <div class="carousel-item">
                                <img src="{{url('/images')}}/{{$kost->fotokost3}}" class="d-block w-100" alt="..." style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                            </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    {{-- <section id="portfolio" class="portfolio-details">
                            <div class="container" data-aos="fade-up">
                                <div class="portfolio-details-slider swiper-container">
                                    <div class="swiper-wrapper align-items-center">
                                        <div class="swiper-slide">
                                            <img src="{{url('/images')}}/{{$kost->fotokost}}" alt="Foto Kamar" class="rounded" style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                </div>
                @if (isset($kost->fotokost2))
                <div class="swiper-slide">
                    <img src="{{url('/images')}}/{{$kost->fotokost2}}" alt="Foto Kamar" class="rounded" style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                </div>
                @elseif (isset($kost->fotokost3))
                <div class="swiper-slide">
                    <img src="{{url('/images')}}/{{$kost->fotokost3}}" alt="Foto Kamar" class="rounded" style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                </div>
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
        </div>
    </section> --}}
    <!-- <div class="project-info-box">
                        <p><b>Categories:</b> Design, Illustration</p>
                        <p><b>Skills:</b> Illustrator</p>
                    </div>/ project-info-box -->
    </div><!-- / column -->
    </div>
    </div>
    </section><!-- End Breadcrumbs -->
</main>

@endsection