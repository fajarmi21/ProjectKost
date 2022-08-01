<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Booking')
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
                    <div>Data Booking
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
                            Data Booking
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
                                                <th scope='col'>Tanggal masuk</th>
                                                <th scope='col'>Nama Kost</th>
                                                <th scope='col'>Alamat Kost</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($booking as $data)
                                            <tr>
                                                <input type="hidden" class="delete_val_id" value="{{$data->id}}">
                                                <th scope='row'>{{$loop->iteration + $booking->firstItem()-1}}</th>
                                                <td>{{$data->nama_penyewa}}</td>
                                                <td>{{($data->tgl_masuk) }}</td>
                                                <td>{{$data->kost['nama_kost']}}</td>
                                                <td>{{$data->kost['alamat_kost']}}</td>
                                                <td>
                                                    <a href="/booking/{{$data->id}}" role='button'>
                                                        <i class="fas fa-file-contract bg-primary p-2 text-white rounded"
                                                            data-toggle="tooltip" title="Detail"></i>
                                                    </a>


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
                                        {{$booking->links()}}
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