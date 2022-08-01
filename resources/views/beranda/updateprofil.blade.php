<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Pelanggan')
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
                            <h3 class="card-title">Data Pelanggan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @auth
                        @if($penyewa != null)
                        <article class="entry">
                            <h2 class="entry-title">
                                <img src="{{url('/asset/img/persyaratan.svg')}}" alt="">
                                Anda sudah mengirim data Pelanggan
                            </h2>
                            <form action="#" method="" enctype="">
                                @csrf
                                <div class="col-ml-8 col-md-12 col-lg-8 entries">
                                    <div class="card-body">
                                        <h5 class="mt-1">Nama Pelanggan : {{$penyewa->users['name']}}</h5>
                                        <h5 class="mt-1">Jenis Kelamin : {{$penyewa->jenis_kelamin}}</h5>
                                        <h5 class="mt-1">Alamat : {{$penyewa->alamat}}</h5>
                                        <h5 class="mt-1">No Telepon : {{$penyewa->no_hp}}</h5>
                                        <h5 class="mt-1">Tanggal Lahir : {{$penyewa->tgl_lahir}}</h5>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="ktp" class="">
                                                    <p style="font-weight: bold;">Foto KTP</p>
                                                </label><br>
                                                <img src="{{url('/images')}}/{{$penyewa->ktp}}" style="max-width: 300px;">

                                            </div>
                                        </div>

                            </form>
                        </article>

                        @else
                        <form action="/penyewa/updateprofil" method="post" enctype="multipart/form-data">
                            @csrf
                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="id_user" class="">
                                            <p style="font-weight: bold;">Nama</p>
                                        </label>
                                        @if(!empty(Auth::user()))
                                        <input name="" value="{{Auth::user()->name}}" readonly id="id_user" type="text" class="form-control">
                                        <input name="user_id" value="{{Auth::user()->id}}" id="id_user" type="hidden" class="form-control">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="">
                                            <p style="font-weight: bold;">Alamat</p>
                                        </label>
                                        <input name="alamat" id="alamat" placeholder="Alamat" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp" class="">
                                            <p style="font-weight: bold;">No Telepon</p>
                                        </label>
                                        <input name="no_hp" id="no_hp" placeholder="No Telepon" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir" class="">
                                            <p style="font-weight: bold;">Tanggal Lahir</p>
                                        </label>
                                        <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin" class="">
                                            <p style="font-weight: bold;">Jenis Kelamin</p>
                                        </label>
                                        <div class="col-2">
                                            <input type="checkbox" id="laki" value="LAKI-LAKI" name="jenis_kelamin"> LAKI-LAKI

                                            <input type="checkbox" id="wanita" value="PEREMPUAN" name="jenis_kelamin"> PEREMPUAN
                                        </div>
                                        <div class="form-group">
                                            <label for="ktp" class="">
                                                <p style="font-weight: bold;">Foto KTP</p>
                                            </label>
                                            <input name="ktp" id="ktp" type="file" class="form-control" onchange="previewKTP(this)">
                                            <img src="" id="previewktp" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </form>
                        @endif
                        @else
                        <article class="entry">
                            <h2 class="entry-title">
                                <img src="{{url('/asset/img/persyaratan.svg')}}" alt="">
                                Input Data Penyewa
                            </h2>
                            <form action="/penyewa/updateprofil" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="id_user" class="">
                                        <p style="font-weight: bold;">Nama</p>
                                    </label>
                                    @if(empty(Auth::user()))
                                    <input name="" value="" id="id_user" type="text" class="form-control">
                                    @endif
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="ktp" class="">
                                        <p style="font-weight: bold;">Foto KTP</p>
                                    </label>
                                    <input name="ktp" id="ktp" type="file" class="form-control" onchange="previewKTP(this)">
                                    <img src="" id="previewktp" style="max-width: 350px; margin-top: 10px;">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="jenis_kelamin" class="">
                                        <p style="font-weight: bold;">Jenis Kelamin</p>
                                    </label>
                                    <div class="col-2">
                                        <input type="checkbox" value="LAKI-LAKI" name="jenis_kelamin"> LAKI-LAKI
                                    </div>
                                    <div class="col-2">
                                        <input type="checkbox" value="PEREMPUAN" name="jenis_kelamin"> PEREMPUAN
                                    </div>
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="alamat" class="">
                                        <p style="font-weight: bold;">Alamat</p>
                                    </label>
                                    <input name="alamat" id="alamat" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="no_hp" class="">
                                        <p style="font-weight: bold;">No Telepon</p>
                                    </label>
                                    <input name="no_hp" id="no_hp" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="tgl_lahir" class="">
                                        <p style="font-weight: bold;">Tanggal Lahir</p>
                                    </label>
                                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan
                                    Data</button>
                            </form>
                        </article>

                        @endauth
                    </div>
                    <!-- /.card -->
                </div>
    </section><!-- End Breadcrumbs -->
    @endsection

    @section('script')
    <script>
        function previewKTP(input) {
            var file = $("input[type=file]").get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function() {
                    $('#previewktp').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    @endsection