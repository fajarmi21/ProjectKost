<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Data Pengunjung')
<!-- section untuk content  -->
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Profil</li>
            </ol>
            <h2>Data Pengunjung</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 entries">
                    @csrf
                    <article class="entry">
                        <form action="/pengunjung/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="raw">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="nama" class="">
                                            <p style="font-weight: bold;">Nama</p>
                                        </label>
                                        <input name="nama" id="nama" type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    </div>
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="tgl_masuk" class="">
                                            <p style="font-weight: bold;">Jenis Kelamin</p>
                                        </label>
                                        <select required class="form-control @error('jk') is-invalid @enderror" id="jk" name="jk">
                                            @error('jk')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <option value="" selected>Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="tgl_lahir" class="">
                                            <p style="font-weight: bold;">Tanggal Lahir</p>
                                        </label>
                                        <input required name="tgl_lahir" id="tgl_lahir" type="date" class="form-control @error('tgl_lahir') is-invalid @enderror">
                                        @error('tgl_lahir')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="telp" class="">
                                            <p style="font-weight: bold;">No. Telepon</p>
                                        </label>
                                        <input required name="telp" id="telp" type="number" class="form-control @error('telp') is-invalid @enderror" placeholder="Masukan No. Telepon">
                                        @error('telp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="alamat" class="">
                                            <p style="font-weight: bold;">Alamat</p>
                                        </label>
                                        <input required name="alamat" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukan Alamat">
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="position-relative form-group mt-4 entry-content">
                                        <label for="ktp" class="">
                                            <p style="font-weight: bold;">Foto KTP</p>
                                        </label>
                                        <input required name="ktp" id="ktp" type="file" class="form-control @error('ktp') is-invalid @enderror" onchange="previewgambarktp(this)">
                                        @error('ktp')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                        <img src="" id="previewgambarktp" style="max-width: 350px; margin-top: 10px;">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan
                                        Data</button>
                                </div>
                            </div>
                        </form>
                    </article>
                </div><!-- End blog entries list -->
            </div>
        </div>
    </section>
</main>
<!-- End #main -->
@endsection
@section('script')
<script>
    function previewgambarktp(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewgambarktp').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection