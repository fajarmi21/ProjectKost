<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Komplain')
<!-- section untuk content  -->
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5">
                    <div class="project-info-box mt-0" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <h5 style="font-size: 1.25rem;">Data Komplain</h5>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>Kami mohon maaf atas ketidaknyamanan Anda</b></p>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>Sehubungan dengan kerusakan yang Anda terima, Kami akan segera memperbaikinya</b></p>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Nama Pelanggan:</b> {{$komplain->name}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Kamar:</b> {{$komplain->nama_kost}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Tanggal Komplain:</b> {{$komplain->tgl_komplain}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Deskripsi:</b> {{$komplain->deskripsi}}</p>
                        <!-- <p class="mb-0"><b>Budget:</b> $500</p> -->
                    </div><!-- / project-info-box -->
                    @if($komplain->status != 'Selesai')
                    <div class="project-info-box mt-0 mb-0">
                        @if(Auth::user()->role_id == '6')
                        <form action="{{ route('komplain.konfirmasi', $komplain->id) }}" method="POST">
                            @csrf
                            <button type="submit" value="Selesai" name="status" class="btn btn-primary" title="konfirmasi">Konfirmasi</button>
                        </form>
                        @elseif(Auth::user()->role_id == '5')
                        <form action="{{ route('komplain.konfirmasi', $komplain->id) }}" method="POST">
                            @csrf
                            <button type="submit" value="Komplain diterima" name="status" class="btn btn-primary" title="konfirmasi">Konfirmasi</button>
                        </form>
                        @endif
                    </div>
                    @endif
                </div><!-- / column -->

                <div class="col-md-7">
                    <img src="{{url('/images')}}/{{$komplain->gambar_ket}}" alt="Bukti Komplain" class="rounded" style="height: 300px; weight: 400px;">
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