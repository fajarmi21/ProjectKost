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
                <li>Booking</li>
            </ol>
            <h2>Data Booking</h2>

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
                            <form action="/booking/store/{{$kost->id}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <input type="hidden" name="kost_id" value="{{$kost->id}}">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="status_bayar" value="Booking">
                                    <input type="hidden" name="statuskost" value="Terisi">
                                    <input name="tgl_booking" id="tgl_booking" type="hidden" value="{{ date('Y-m-d') }}">
                                    <div class="raw" style="border: 5; border-style:solid">
                                        <ul>
                                            <h3 style="font-weight: bold; color:crimson"> Catatan : </h3>
                                        </ul>
                                        <ul style="font-weight: bold">DP yang harus dibayar adalah : 50.000</ul>
                                        <ul style="font-weight: bold">Batas waktu pembayaran adalah 1 minggu</ul>
                                        <ul style="font-weight: bold">Silahkan transfer pada rekening berikut :</ul>
                                        <ul style="font-weight: bold">Nama : Suyatik</ul>
                                        <ul style="font-weight: bold">No Rekening : 033278142</ul>
                                    </div>

                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="nama_penyewa" class="">
                                            <p style="font-weight: bold;">Nama Pelanggan</p>
                                        </label>
                                        <input name="nama_penyewa" id="nama_penyewa" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="tgl_masuk" class="">
                                            <p style="font-weight: bold;">Tanggal Masuk</p>
                                        </label>
                                        <input required name="tgl_masuk" id="tgl_masuk" type="date" class="form-control @error('tgl_masuk') is-invalid @enderror">
                                        @error('tgl_masuk')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan Data</button>

                            </form>
                        </article>
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
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </section>
                                <h5 class="mt-1">Fasilitas</h5>
                                <p>{{$kost->fasilitas}}</p>
                                <h5>Biaya Sewa</h5>
                                <p>{{$kost->harga}}</p>
                            </div>
                            <div class="card-footer">
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
                            </div>
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