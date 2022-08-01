<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Pelanggan')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5">
                    <div class="project-info-box mt-0" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <h5 style="font-size: 1.25rem;">Detail Pelanggan</h5>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>Pelanggan harus berumur lebih dari 17 tahun</b></p>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Nama: </b>{{$user->name}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Tanggal Lahir: </b>{{$show->tgl_lahir}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Jenis Kelamin: </b>{{$show->jenis_kelamin}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Alamat: </b>{{$show->alamat}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>No. HP: </b>{{$show->no_hp}}</p>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box mt-0 mb-0">
                        @if ($user->role_id == 4)
                        <form action="{{ route('penyewa.konfirmasi', $show->user_id) }}" method="POST">
                            @csrf
                            <button type="submit" value="6" name="role" class="btn btn-primary" title="konfirmasi">Konfirmasi</button>
                        </form>
                        @endif
                    </div>
                </div><!-- / column -->

                <div class="col-md-7">
                    <img src="{{url('/images')}}/{{$show->ktp}}" alt="Belum Ada Foto KTP" class="rounded" style="width: auto; max-width: 100%; max-height: 500px;-webkit-backface-visibility: hidden;">
                </div><!-- / column -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->
</main>
@endsection