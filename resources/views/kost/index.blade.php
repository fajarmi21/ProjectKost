<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Kamar')
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
                            <h3 class="card-title">Data Kamar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        <a href="{{route('kost.create')}}" class="btn btn-success btn-pill mb-3">Tambah Kamar</a>
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Kamar</th>
                                                    <th scope='col'>Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @foreach($kost as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->nama_kost}}</td>
                                                    <td>{{$data->statuskost}}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kost.destroy', $data->id) }}" method="POST">
                                                            <a href="{{ route('kost.show', $data->id)}}" class="btn btn-primary mb-3"><i class=" fas fa-file"></i> Detail</a>
                                                            <a href="{{ route('kost.edit', $data->id)}}" class="btn btn-warning mb-3"><i class=" fas fa-edit"></i> Edit</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            @if ($data->statuskost == "Tersedia")
                                                            <button type="submit" class="btn btn-danger mb-3"><i class=" fas fa-trash"></i> Hapus</button>
                                                            @else
                                                            <button type="submit" class="btn btn-danger mb-3" disabled><i class=" fas fa-trash"></i> Hapus</button>
                                                            @endif
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