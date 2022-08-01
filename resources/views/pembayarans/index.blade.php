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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Nama Pelanggan</th>
                                                    <th scope='col'>Tanggal Transfer</th>
                                                    <th scope='col'>Bulan</th>
                                                    <th scope='col'>Status Pembayaran</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @foreach($pembayaran as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->nama_penyewa}}</td>
                                                    <td>{{$data->created_at}}</td>
                                                    <td>{{$data->bulan}}</td>
                                                    <td>{{$data->status_bayar}}</td>
                                                    <td>
                                                        <a href="/pembayaran/{{$data->id}}" class="btn btn-info"><i class=" fas fa-file"></i> Detail</a>
                                                        @if($data->status_bayar != 'Diterima')
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default{{ $data->id }}">
                                                            Konfirmasi
                                                        </button>
                                                        <div class="modal fade" id="modal-default{{ $data->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Konfirmasi Pembayaran {{$data->nama_penyewa}}</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <img src="{{url('/images')}}/{{$data->bukti}}" class="img-fluid" alt="">
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                        <form action="{{ route('admin.konfirmasi', $data->id) }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <button type="submit" id="status" name="status" value="Ditolak" class="btn btn-danger">Tolak</button>
                                                                            <button type="submit" id="status" name="status" value="Diterima" class="btn btn-success">Konfirmasi</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection