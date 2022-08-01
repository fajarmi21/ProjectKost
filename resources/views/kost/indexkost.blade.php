<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Daftar Kamar')
<!-- section untuk content  -->
@section('content')
<main id="main" style="margin-top: 50px;">

    <!-- ======= Clients Section ======= -->
    <section id="portfolio" class="portfolio-details">
        <div class="container" data-aos="fade-up">
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
                                    <a id="detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-kategori="{{$data->kategori_kost}}" data-harga="{{$data->harga}}" data-fasilitas="{{$data->fasilitas}}" data-ket="{{$data->keterangan}}" data-nama="{{$data->nama_kost}}" data-img="{{url('/images')}}/{{$data->fotokost}}" data-img2="{{url('/images')}}/{{$data->fotokost2}}" class="btn btn-info">Detail</a>
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
    <!-- End Clients Section -->


</main><!-- End #main -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Kamar</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <section id="portfolio" class="portfolio-details">
                            <div class="container" data-aos="fade-up">
                                <div class="portfolio-details-slider swiper-container">
                                    <div class="swiper-wrapper align-items-center">
                                        <div class="swiper-slide">
                                            <img src="{{url('/images')}}/{{$data->fotokost}}" id="fotokost" alt="" style=" width:100%;">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="{{url('/images')}}/{{$data->fotokost2}}" id="fotokost2" alt="" style="width:100%;">
                                        </div>

                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kamar</label>
                            </div>
                            <div class="col-md-10">
                                <h3 id="namakost"></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Kategori</label>
                            </div>
                            <div class="col-md-10">
                                <h3 id="kategori"></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Fasilitas</label>
                            </div>
                            <div class="col-md-10">
                                <h3 id="fasilitas"></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Keterangan</label>
                            </div>
                            <div class="col-md-10">
                                <h3 id="ket"></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Harga Sewa</label>
                            </div>
                            <div class="col-md-10">
                                <h3 id="harga"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ url('/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).on('click', '#detail', function() {
        var img = $(this).data('img');
        var img2 = $(this).data('img2');
        var nama = $(this).data('nama');
        var kategori = $(this).data('kategori');
        var fasilitas = $(this).data('fasilitas');
        var harga = $(this).data('harga');
        var ket = $(this).data('ket');


        $('#fotokost').attr('src', img);
        $('#fotokost2').attr('src', img2);
        $('#namakost').text(nama);
        $('#kategori').text(kategori);
        $('#ket').text(ket);
        $('#harga').text(harga);
        $('#fasilitas').text(fasilitas);
    });
</script>
@endsection