<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Pelanggan')
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
                            <h3 class="card-title">Data Pelanggan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Nama</th>
                                                    <th scope='col'>Kamar Kost</th>
                                                    <th scope="col">Tanggal Mulai</th>
                                                    <th scope="col">Tanggal Berakhir</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    Carbon\Carbon::useMonthsOverflow(false);
                                                    $no = 0;
                                                @endphp
                                                @foreach($kamar as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->name}}</td>
                                                    <td>
                                                        @if ($data->status == 'sewa')
                                                            {{$data->nama_kost}}
                                                        @else
                                                            Keluar
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $data->tgl_bayar)->month($data->bulan)->format("d-m-Y")}}
                                                    </td>
                                                    <td>
                                                        {{Carbon\Carbon::createFromFormat("Y-m-d H:i:s",
                                                        $data->tgl_bayar)->month($data->bulan)->addMonth(1)->format("d-m-Y")}}
                                                    </td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('penyewa.destroy', $data->user_id) }}" method="POST">
                                                            <a href="{{ route('penyewa.show', $data->user_id)}}" class="btn btn-primary mb-3"><i class=" fas fa-file"></i>Detail</a>
                                                            @if ($data->status == 'sewa')
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger mb-3"><i class="fas fa-arrow-left"></i> Keluar Kost</button>
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