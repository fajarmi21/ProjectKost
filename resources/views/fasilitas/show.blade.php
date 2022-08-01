<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Data Fasilitas')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Data Fasilitas</h5>
            <div class="card-body">
                <form action="#" method="">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Nama Fasilitas</label>
                                <input type="text" class="form-control" readonly value="{{$fasilitas->fasilitas}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Harga Sewa</label>
                                <input type="text" class="form-control" readonly value="{{$fasilitas->harga}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="" style="font-weight: bold;">Keterangan</label>
                                <input type="text" class="form-control" readonly value="">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="fotofasilitas" style="font-weight: bold;">fotofasilitas</label><br>
                                <img src="{{url('/images')}}/{{$fasilitas->foto}}" style="max-width: 300px;">
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('fasilitas.edit', $fasilitas->id)}}" class="btn btn-primary"><i class="pe-7s-diskette"></i> Edit Data</a>
                </form>
            </div>
        </div>

    </div>
    @endsection