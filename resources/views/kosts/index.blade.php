<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Kost')
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
                    <div>Data Kost
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
                            Data Kost
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
                                                <th scope='col'>Nama Pemilik</th>
                                                <th scope='col'>Alamat Kost</th>
                                                <th scope='col'>Nama Kost</th>
                                                <th scope='col'>Status Kost</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($kost as $data)
                                            <tr>
                                                <input type="hidden" class="delete_val_id" value="{{$data->id}}">
                                                <th scope='row'>{{$loop->iteration + $kost->firstItem()-1}}</th>
                                                <td>{{$data->users['name']}}</td>
                                                <td>{{$data->alamat_kost}}</td>
                                                <td>{{$data->nama_kost}}</td>
                                                <td>{{$data->statuskost}}</td>
                                                <td>
                                                    <a href="/kost/{{$data->id}}" class="btn btn-primary mb-3"><i class=" fas fa-plus"></i>Detail</a>
                                                    <a href="/kost/{{$data->id}}/edit" class="btn btn-warning mb-3"><i class=" fas fa-plus"></i>Edit</a>
                                                    <a role="button" class="btn btn-danger mb-3 delete" nama="{{$data->users['name']}}" data-toggle="tooltip" title="Hapus">Hapus


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
                                        {{$kost->links()}}
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