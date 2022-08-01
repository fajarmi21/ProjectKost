<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Komplain')
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
                            <h3 class="card-title">Data Komplain</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <!-- <a href="/booking/create" class="btn btn-primary mb-3"><i class=" fas fa-plus"></i>Tambah Booking</a> -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @if(Auth::user()->role_id == '6')
                                    <div class="table-responsive">
                                        <a href="{{ route('komplain.create')}}" class="btn btn-success btn-pill mb-3">Komplain</a>
                                        <table class="table table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Tanggal Komplain</th>
                                                    <th scope='col'>Pesan Komplain/Deskripsi</th>
                                                    <th spoce='col'>Status Komplain</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @foreach($komplain as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->tgl_komplain}}</td>
                                                    <td>{{$data->deskripsi}}</td>
                                                    <td>{{$data->status}}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('komplain.destroy', $data->id) }}" method="POST">
                                                            <a href="/komplain/{{$data->id}}" class="btn btn-primary mb-3"><i class=" fas fa-file"></i>Detail</a>
                                                            <!-- <a href="/komplain/{{$data->id}}/edit" class="btn btn-warning mb-3"><i class=" fas fa-edit"></i>Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger mb-3"><i class=" fas fa-trash"></i> Hapus</button> -->
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @elseif(Auth::user()->role_id == '5')
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="example">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Nama Pelanggan</th>
                                                    <th scope='col'>Tanggal Komplain</th>
                                                    <th scope='col'>Pesan Komplain/Deskripsi</th>
                                                    <th spoce='col'>Status Komplain</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @foreach($komplain as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->name}}</td>
                                                    <td>{{$data->tgl_komplain}}</td>
                                                    <td>{{$data->deskripsi}}</td>
                                                    <td>{{$data->status}}</td>
                                                    <td>
                                                        <a href="/komplain/{{$data->id}}" class="btn btn-primary mb-3"><i class=" fas fa-plus"></i>Detail</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endif
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