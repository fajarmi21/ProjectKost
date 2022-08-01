<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Data Pembayaran')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Data Pembayaran</h5>
            <div class="card-body">
                <form action="#" method="">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama Penyewa</label>
                                <input type="text" class="form-control" readonly value="{{$pembayaran->nama_penyewa}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="bukti" style="font-weight: bold;">Bukti Pembayaran</label><br>
                                <img src="{{url('/images')}}/{{$pembayaran->bukti}}" style="max-width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Tanggal Masuk</label>
                                <input type="text" class="form-control" readonly
                                    value="{{date('d F Y'), strtotime($pembayaran->booking->tgl_masuk) }}">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 entries">


                            <h4 class="mb-3">{{$pembayaran->booking->kost->nama_kost}}</h2>
                                <img src="{{ url('/images') }}/{{$pembayaran->booking->kost->fotokost}}"
                                    style="width: 22rem;" alt="">
                                <h5 class="mt-1">Fasilitas</h5>
                                <p>{{$pembayaran->booking->kost->fasilitas}}</p>
                                <h5>Lokasi</h5>
                                <p>{{$pembayaran->booking->kost->alamat_kost}}</p>
                                <h5>Biaya Sewa</h5>
                                <p>{{$pembayaran->booking->kost->kategori}}</p>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    @endsection