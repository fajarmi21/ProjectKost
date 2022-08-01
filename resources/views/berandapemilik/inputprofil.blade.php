<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layout.index')
<!-- section untu title  -->
@section('title', 'Data pemilik')
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
            <h2>Data pemilik</h2>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-md-12 col-lg-8 entries">
@auth
                    @if($pemilik != null)
                    <article class="entry">
                        <h2 class="entry-title">
                            <img src="{{url('/asset/img/persyaratan.svg')}}" alt="">
                            Anda sudah mengirim data pemilik
                        </h2>
                        <form action="#" method="" enctype="">
                        @csrf
                        <div class="form row">
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="us" class=""><p style="font-weight: bold;">Nama</p></label>
                                    <input name="" value="{{$pemilik->users['name']}}"  id="us" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="ktp" class=""><p style="font-weight: bold;">Foto KTP</p></label><br>
                                    <img src="{{url('/images')}}/{{$pemilik->ktp}}" style="max-width: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="form row">
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="jenis_kelamin" class=""><p style="font-weight: bold;">Jenis Kelamin</p></label>
                                    <input name="" value="{{$pemilik->jenis_kelamin}}"  id="jenis_kelamin" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="alamat" class=""><p style="font-weight: bold;">Alamat</p></label>
                                    <input name="" value="{{$pemilik->alamat}}"  id="alamat" type="text" class="form-control" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form row">
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="no_hp" class=""><p style="font-weight: bold;">No Telepon</p></label>
                                    <input name="" value="{{$pemilik->no_hp}}"  id="no_hp" type="text" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="tgl_lahir" class=""><p style="font-weight: bold;">Tanggal Lahir</p></label>
                                    <input name="" value="{{$pemilik->tgl_lahir}}"  id="tgl_lahir" type="date" class="form-control" readonly>
                                </div>
                            </div>
                            </div>
                        <br>
                            <a href="/berandapemilik" class="btn btn-primary">Kembali</a>
                        </form>
                    </article>

                    @else

                    <article class="entry">
                        <h2 class="entry-title">
                            <img src="{{url('/asset/img/persyaratan.svg')}}" alt="">
                            Input Data pemilik
                        </h2>
                            <form action="/pemilik/inputprofil" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="id_user" class=""><p style="font-weight: bold;">Nama</p></label>
                                    @if(!empty(Auth::user()))
                                    <input name="" value="{{Auth::user()->name}}" readonly id="id_user" type="text" class="form-control">
                                    <input name="user_id" value="{{Auth::user()->id}}" id="id_user" type="hidden" class="form-control">
                                    @endif
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="ktp" class=""><p style="font-weight: bold;">Foto KTP</p></label>
                                    <input name="ktp" id="ktp" type="file" class="form-control" onchange="previewKTP(this)">
                                    <img src="" id="previewktp" style="max-width: 350px; margin-top: 10px;">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="jenis_kelamin" class=""><p style="font-weight: bold;">Jenis Kelamin</p></label>
                                    <div class="col-2">
                            <input type="checkbox" value="LAKI-LAKI" name="jenis_kelamin"> LAKI-LAKI
                        </div>
                        <div class="col-2">
                            <input type="checkbox" value="PEREMPUAN" name="jenis_kelamin"> PEREMPUAN
                        </div>
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="alamat" class=""><p style="font-weight: bold;">Alamat</p></label>
                                    <input name="alamat" id="alamat" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="no_hp" class=""><p style="font-weight: bold;">No Telepon</p></label>
                                    <input name="no_hp" id="no_hp" type="text" data-bs-toggle="modal" data-bs-target="#exampleModal" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="tgl_lahir" class=""><p style="font-weight: bold;">Tanggal Lahir</p></label>
                                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan Data</button>
                            </form>
                    </article>
                    @endif
                    <!-- End blog entry -->
@else
                    <article class="entry">
                        <h2 class="entry-title">
                            <img src="{{url('/asset/img/persyaratan.svg')}}" alt="">
                            Input Data pemilik
                        </h2>
                            <form action="/pemilik/inputprofil" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form row">
                        <div class="col-md-6">
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="id_user" class=""><p style="font-weight: bold;">Nama</p></label>
                                    @if(empty(Auth::user()))
                                    <input name="" value=""  id="id_user" type="text" class="form-control">
                                    @endif
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="ktp" class=""><p style="font-weight: bold;">Foto KTP</p></label>
                                    <input name="ktp" id="ktp" type="file" class="form-control" onchange="previewKTP(this)">
                                    <img src="" id="previewktp" style="max-width: 350px; margin-top: 10px;">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="jenis_kelamin" class=""><p style="font-weight: bold;">Jenis Kelamin</p></label>
                                    <div class="col-2">
                            <input type="checkbox" value="LAKI-LAKI" name="jenis_kelamin"> LAKI-LAKI
                        </div>
                        <div class="col-2">
                            <input type="checkbox" value="PEREMPUAN" name="jenis_kelamin"> PEREMPUAN
                        </div>
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="alamat" class=""><p style="font-weight: bold;">Alamat</p></label>
                                    <input name="alamat" id="alamat" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="no_hp" class=""><p style="font-weight: bold;">No Telepon</p></label>
                                    <input name="no_hp" id="no_hp" type="text" class="form-control">
                                </div>
                                <div class="position-relative form-group mt-4 entry-content">
                                    <label for="tgl_lahir" class=""><p style="font-weight: bold;">Tanggal Lahir</p></label>
                                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan Data</button>
                            </form>
                    </article>

@endauth
                </div><!-- End blog entries list -->

                

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection

@section('script')
<script>
    function previewKTP(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewktp').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection