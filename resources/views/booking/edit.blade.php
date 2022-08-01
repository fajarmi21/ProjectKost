<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Booking')
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
                            <h3 class="card-title">Data Booking</h3>
                        </div>

                        <div class="card-body">
                            <form action="/booking/update/{{$booking->id}}" method="post" enctype="multipart/form-data">
                                <!--  untuk keamanan -->
                                @csrf
                                <input type="hidden" name="kost_id" value="{{$booking->kost->id}}" required>
                                <div class="form-group">
                                    <label for="nama_penyewa" style="font-weight: bold;">Nama Penyewa</label>
                                    <input type="text" class="form-control" id="al" name="nama_penyewa" value="{{$booking['nama_penyewa']}}" placeholder="Masukkan nama_penyewa" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_booking" style="font-weight: bold;">Tanggal Boooking</label>
                                    <input type="date" class="form-control" id="al" name="tgl_booking" value="{{$booking['tgl_booking']}}" placeholder="Masukkan tgl_masuk" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk" style="font-weight: bold;">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="al" name="tgl_masuk" value="{{$booking['tgl_masuk']}}" placeholder="Masukkan tgl_masuk" required>
                                </div>


                                <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Update Data</button>

                                <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <!-- /.card -->
    </section><!-- End Breadcrumbs -->

    @endsection