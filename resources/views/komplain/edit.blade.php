<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Komplain')
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
                            <h3 class="card-title">Data Komplain</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('komplain.update', $komplain->id)}}" method="post" enctype="multipart/form-data">
                                <!--  untuk keamanan -->
                                @method('patch')
                                @csrf

                                <div class="form-group">
                                    <label for="name" style="font-weight: bold;">Nama</label>
                                    <input name="" value="{{$komplain->name}}" readonly id="id_user" type="text" class="form-control">
                                    <input name="user_id" value="{{$komplain->user_id}}" readonly id="id_user" type="hidden" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="kost_id" class="">
                                        <p style="font-weight: bold;">Nama Kamar</p>
                                    </label>
                                    <input name="" value="{{$komplain->nama_kost}}" readonly id="" type="text" class="form-control">
                                    <input name="kost_id" value="{{$komplain->kost_id}}" id="kost_id" type="hidden" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_komplain" style="font-weight: bold;">Tanggal Komplain</label>
                                    <input type="date" class="form-control" id="al" name="tgl_komplain" readonly id="tgl_komplain" value="{{$komplain->tgl_komplain}}" placeholder="Masukkan tgl_komplain" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_komplain" style="font-weight: bold;">Deskripsi</label>
                                    <input type="text" class="form-control" id="al" name="deskripsi" value="{{$komplain->deskripsi}}" placeholder="Masukkan deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_ket" style="font-weight: bold;">Tambahkan Gambar Keterangan</label>
                                    <input type="file" class="form-control" id="gambar_ket" name="gambar_ket" onchange="previewgambar_ket(this)">
                                    <img src="{{url('/images')}}/{{$komplain->gambar_ket}}" alt="" id="previewgambar_ket" style="max-width: 300px; margin-top: 20px;">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

                <!-- /.card -->
    </section><!-- End Breadcrumbs -->

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
