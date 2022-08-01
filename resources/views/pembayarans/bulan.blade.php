<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Pembayaran Bulanan')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-hourglass icon-gradient bg-love-kiss"> </i>
                    </div>
                    <div>Data Pembayaran
                        <div class="page-title-subheading">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            Data Pembayaran Bulanan
                        </div>
                    </div>
                    <div class="main-card card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th scope='col'>Nama Penyewa</th>
                                                <th scope='col'>Tanggal Pembayaran</th>
                                                <th scope='col'>Status Pembayaran</th>
                                                <th scope="col">Aksi</th>
                                        </thead>
                                        <tbody>
                                            @forelse($pembayaran as $data)
                                            <tr>
                                                <input type="hidden" class="delete_val_id" value="{{$data->id}}">
                                                <th scope='row'>{{$loop->iteration + $pembayaran->firstItem()-1}}</th>
                                                <td>{{$data->nama_penyewa}}</td>
                                                <td>{{$data->tgl_bayar}}</td>
                                                <td>{{$data->status_bayar}}</td>
                                                <td>
                                                    <a href="/pembayaran/{{$data->id}}" class="btn btn-info"><i class=" fas fa-plus"></i>Detail</a>
                                                    @if($data->status_bayar != 'Diterima')
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{ $data->id }}">
                                                    Konfirmasi
                                                    </button>
                                                    <div class="modal fade" id="modal-default{{ $data->id }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Konfirmasi Pembayaran {{$data->nama_penyewa}}</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{url('/images')}}/{{$data->bukti}}" class="img-fluid" alt="">
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                                                    <form action="/pembayaran/konfirmasi/admin/{{$data->id}}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary">Konfirmasi</button>
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
                                            @empty
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No matching records found
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <ul class="pagination mt-4 ml-2">
                                        {{$pembayaran->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection