<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Data Booking')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Data Booking</h5>
            <div class="card-body">
                <form action="#" method="">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama Penyewa</label>
                                <input type="text" class="form-control" readonly value="{{$booking->users['name']}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="tgl_masuk" style="font-weight: bold;">Tanggal Masuk</label>
                                <input type="date" class="form-control" readonly value="{{$booking->tgl_masuk}}">
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 entries">


                            <h4 class="mb-3">{{$booking->kost->nama_kost}}</h2>
                                <img src="{{ url('/images') }}/{{$booking->kost->fotokost}}" style="width: 22rem;"
                                    alt="">
                                <h5 class="mt-1">Fasilitas</h5>
                                <p>{{$booking->kost->fasilitas}}</p>
                                <h5>Lokasi</h5>
                                <p>{{$booking->kost->alamat_kost}}</p>
                                <h5>Biaya Sewa</h5>
                                <p>{{$booking->kost->kategori}}</p>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
    @endsection