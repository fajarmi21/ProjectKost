<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Fasilitas')
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
                            <h3 class="card-title">Data Fasilitas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        <a href="{{ route('fasilitas.create') }}" class="btn btn-success btn-pill mb-3">Tambah Fasilitas</a>
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Fasilitas</th>
                                                    <th scope='col'>Harga</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no = 0; @endphp
                                            @foreach($fasilitas as $data)
                                            @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->fasilitas}}</td>
                                                    <td>{{$data->harga}}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('fasilitas.destroy', $data->id) }}" method="POST">
                                                            <a href="{{ route('fasilitas.show', $data->id)}}" role="button">
                                                                <i class="fas fa-info bg-primary p-2 text-white rounded" data-toggle="tooltip" title="Detail"></i>
                                                            </a>
                                                            <a href="{{ route('fasilitas.edit', $data->id)}}" role="button">
                                                                <i class="fas fa-file-signature bg-warning p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="fas fa-trash-alt bg-danger p-2 text-white rounded delete" title="hapus"></button>
                                                        </form>
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
