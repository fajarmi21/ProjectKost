<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Data Kost')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Data Kost</h5>
            <div class="card-body">
                <form action="#" method="">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama Pemilik</label>
                                <input type="text" class="form-control" readonly value="{{$kost->users->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama Kost</label>
                                <input type="text" class="form-control" readonly value="{{$kost->nama_kost}}">
                            </div>
                        </div>
                        <div class="form row">
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="" style="font-weight: bold;">Jumlah Kamar</label>
                                    <input type="text" class="form-control" readonly value="{{$kost->jumlah_kamar}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative form-group">
                                    <label for="" style="font-weight: bold;">fasilitas</label>
                                    <input type="text" class="form-control" readonly value="{{$kost->fasilitas}}">
                                </div>
                            </div>
                            <div class="form row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="" style="font-weight: bold;">Harga Sewa</label>
                                        <input type="text" class="form-control" readonly value="{{$kost->kategori}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="" style="font-weight: bold;">alamat_kost</label>
                                        <input type="text" class="form-control" readonly value="{{$kost->alamat_kost}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="" style="font-weight: bold;">statuskost</label>
                                        <input type="text" class="form-control" readonly value="{{$kost->statuskost}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="" style="font-weight: bold;">kategori_kost</label>
                                        <input type="text" class="form-control" readonly value="{{$kost->kategori_kost}}">
                                    </div>
                                </div>
                                <div class="form row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="fotokost" style="font-weight: bold;">fotokost</label><br>
                                            <img src="{{url('/images')}}/{{$pembayaran->fotokost}}" style="max-width: 300px;">
                                        </div>
                                    </div>

                </form>
            </div>
        </div>

    </div>
    @endsection