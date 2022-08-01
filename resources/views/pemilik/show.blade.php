<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Data Pemilik')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Data pemilik</h5>
            <div class="card-body">
                <form action="#" method="">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama</label>
                                <input type="text" class="form-control" readonly value="{{$pemilik->users['name']}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="ktp" style="font-weight: bold;">Foto KTP</label><br>
                                <img src="{{url('/images')}}/{{$pemilik->ktp}}" style="max-width: 300px;">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="jenis_kelamin" style="font-weight: bold;">Jenis Kelamin</label>
                                <input type="text" class="form-control" readonly value="{{$pemilik->jenis_kelamin}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="al" style="font-weight: bold;">Alamat</label>
                                <input type="text" class="form-control" readonly value="{{$pemilik->alamat}}">
                            </div>
                        </div>
                    </div>
                        <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="no_hp" style="font-weight: bold;">No Telepon</label>
                                <input type="text" class="form-control" readonly value="{{$pemilik->no_hp}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="tgl_lahir" style="font-weight: bold;">Tanggal Lahir</label>
                                <input type="date" class="form-control" readonly value="{{$pemilik->tgl_lahir}}">
                            </div>
                        </div>
                    </div>
                    
                    <a href="/pemilik" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection