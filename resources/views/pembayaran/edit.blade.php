<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Pembayaran')
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
                            <h3 class="card-title">Data Pembayaran</h3>
                        </div>

                        <div class="card-body">
                            <form action="{{route('pembayaran.update', $pembayaran->id)}}" method="post" enctype="multipart/form-data">
                                <!--  untuk keamanan -->
                                @method('PUT') 
                                @csrf
                                <div class="form-group">
                                    <label for="nama_penyewa" style="font-weight: bold;">Nama Penyewa</label>
                                    <input type="text" class="form-control" id="al" name="nama_penyewa" value="{{$pembayaran['nama_penyewa']}}" placeholder="Masukkan nama_penyewa" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_bayar" style="font-weight: bold;">Tanggal Pembayaran</label>
                                    <input type="date" class="form-control" id="al" name="tgl_bayar" value="{{$pembayaran['tgl_bayar']}}" placeholder="Masukkan tgl_masuk" required>
                                </div>
                                <div class="form-group">
                                    <label for="bulan" style="font-weight: bold;">Bulan</label>
                                    <select class="form-control" name="bulan">
                                            <option value="{{$pembayaran->bulan}}">@if(empty($pembayaran->bulan)) Pilih Bulan @else {{$pembayaran->bulan}} @endif </option>
                                                <option value="snuari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="fas" style="font-weight: bold;">Fasilitas Tambahan</label>
                                    <select class="form-control" name="fasilitas">
                                        @if(empty($pembayaran['fas_id']))
                                        <option value="">Pilih Fasilitas</option>
                                        @else
                                        <option value="{{$pembayaran['fas_id']}}">{{$pembayaran->fasilitas}}</option>
                                        @endif
                                        @foreach ($fasilitas as $item)
                                            <option value="{{ $item->id }}">{{ $item->fasilitas}} - {{ $item->harga}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Update Data</button>

                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.card -->
    </section><!-- End Breadcrumbs -->

    @endsection