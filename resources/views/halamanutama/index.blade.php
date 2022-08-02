<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Beranda')
<!-- section untuk content  -->
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row">
            <div class="col-xl-6">
                <h1>Kost Bu Tik</h1>
                <h2>Cari, Bayar, & Sewa Kost Impianmu Secara Online</h2>
                <a href="/login" class="btn-get-started scrollto">Mulai</a>
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="portfolio" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">

                    <div class="swiper-slide">
                        <img src="{{url('/asset/img/portfolio/1.png')}}" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{url('/asset/img/portfolio/2.png')}}" alt="">
                    </div>

                    <div class="swiper-slide">
                        <img src="{{url('/asset/img/portfolio/3.png')}}" alt="">
                    </div>

                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <!-- End Clients Section -->


    <!-- ======= Breadcrumbs ======= -->
    <section id="portfolio" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="raw" style="border: 5; border-style:solid; margin-top: 100px;">
                <h5 style="font-size: 1.25rem; font-weight: bold; color: #000000;">Daftar Kamar</h5>
                <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #000000;letter-spacing: 0.03rem; margin-bottom: 10px;">
                    <b>Kami menyediakan beberapa kamar yang bisa anda tempati</b>
                </p>
            </div>
            <div class="row">
                @foreach($kost as $data)
                <div class="col-md-3">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="card">
                                <img src="{{url('/images')}}/{{$data->fotokost}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$data->nama_kost}}</h5>
                                    <p class="card-text">{{$data->kategori}}</p>
                                    <a href="/home/detail/{{$data->id}}" class="btn btn-info">Detail</a>
                                    <a href="/booking/pesan/{{$data->id}}" class="btn btn-warning">Booking</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="portfolio" class="portfolio-details">
        <div class="container" data-aos="fade-up">
            <div class="raw" style="border: 5; border-style:solid; margin-top: 100px;">
                <h5 style="font-size: 1.25rem; font-weight: bold; color: #000000;">Daftar Fasilitas Tambahan</h5>
                <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #000000;letter-spacing: 0.03rem; margin-bottom: 10px;">
                    <b>Kami juga menyediakan fasilitas tambahan yang bisa anda pakai dengan menambah biaya</b>
                </p>
                <p>Harga yang tertera adalah harga untuk menggunakan fasilitas tambahan selama 1 bulan
                </p>
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
                                    <h6 class="card-text">{{$data->ket_fas}}</h6>
                                    <b class="card-text">{{$data->harga}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>




    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Layanan</h2>
                <p>Kami memberikan pelayanan penuh kepada seluruh pengunjung website untuk memudahkan dalam mencari,
                    menyewa, maupun membayar kos.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <i class="bi bi-briefcase"></i>
                        <h4><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Kostnya Terpercaya
                            </a></h4>
                        <p>Semua kost sudah dicek langsung ke lapangan untuk
                            memastikan bahwa fasilitas dan foto yang ditampilkan sudah sesuai aslinya.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-card-checklist"></i>
                        <h4><a href="#">Booking Langsung</a></h4>
                        <p>Bisa langsung mengajukan sewa kos bahkan, Transaksi lebih aman, tanpa takut kamarnya penuh keduluan orang lain.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-bar-chart"></i>
                        <h4><a href="#">Komplain</a></h4>
                        <p>Kamu bisa mengajukan komplain jika fasilitas atau ada yang tidak sesuai dengan keterangan</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-md-0">
                    <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-binoculars"></i>
                        <h4><a href="#">Fasilitas Tambahan</a></h4>
                        <p>Kami menyediakan jasa lain seperti tukang angkat galon, kebersihan dan lain lain</p>
                    </div>
                </div>

            </div>
    </section>
    <!-- End Services Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contact</h2>
                <p>jika ada yang ingin ditanyakan mengenai kost bu tik silahkan hubungi kami melalui kolom dibawah ini.
                </p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">

                <div class="col-lg-6">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Kami</h3>
                                <p>kostbutik@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box mt-4">
                                <i class="bx bx-phone-call"></i>
                                <h3>Telepon Kami</h3>
                                <p>+62 5589 5488 55<br>+62 6678 4445 44</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1634.1530719203993!2d111.97973356579428!3d-7.805804806335822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x38e489e8404a68c4!2zN8KwNDgnMjIuNSJTIDExMcKwNTgnNTIuMSJF!5e1!3m2!1sid!2sid!4v1654134932546!5m2!1sid!2sid" width="546" height="273" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <section id="services" class="services section-bg ">
                    <div class="container" data-aos="fade-up">

                        <div class="section-title">
                            <h2>Infokost.kdr</h2>
                            <p>Website penyedia jasa sewa kost dikota kediri sejak tahun 2021</p>
                        </div>
                    </div>
            </div>
            </section>
        </div>
    </div>
</div>
</div>
<!-- End Modal -->
<!-- akhir section content  -->
@endsection