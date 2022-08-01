<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Tambah Data Komplain')
<!-- section untuk content  -->
@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Komplain</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-12 col-lg-8 entries">
                                @csrf
                                <article class="entry">
                                    <form action="{{ route('komplain.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="us" class="">
                                                    <p style="font-weight: bold;">Nama Pelanggan</p>
                                                </label>
                                                @if(!empty(Auth::user()))
                                                <input name="" value="{{Auth::user()->name}}" readonly id="id_user" type="text" class="form-control">
                                                <input name="status" value="Menunggu Konfirmasi" readonly id="status" type="hidden" class="form-control">
                                                <input name="user_id" value="{{Auth::user()->id}}" id="id_user" type="hidden" class="form-control">
                                                @endif
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="kost_id" class="">
                                                    <p style="font-weight: bold;">Kamar</p>
                                                </label>
                                                <input name="" value="{{$komplain->nama_kost}}" readonly id="" type="text" class="form-control">
                                                <input name="kost_id" value="{{$komplain->kost->id}}" id="kost_id" type="hidden" class="form-control">
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="deskripsi" class="">
                                                    <p style="font-weight: bold;">Pesan Komplain/Deskripsi</p>
                                                </label>
                                                <input required name="deskripsi" id="deskripsi" type="text" class="form-control @error('deskripsi') is-invalid @enderror">
                                                @error('deskripsi')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="gambar_ket" class="">
                                                    <p style="font-weight: bold;">Tambahkan Gambar Keterangan</p>
                                                </label>
                                                <input required name="gambar_ket" id="gambar_ket" type="file" class="form-control @error('gambar_ket') is-invalid @enderror" onchange="previewgambar_ket(this)">
                                                @error('gambar_ket')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                <img src="" id="previewgambar_ket" style="max-width: 350px; margin-top: 10px;">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan Data</button>
                                    </form>
                                </article>
                            </div><!-- End blog entries list -->
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
    function previewgambar_ket(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewgambar_ket').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection