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
                                        @if ($ids->status_bayar == "Diterima(Booking)")
                                        <a href="{{ route('pembayaran.create', $ids->id)}}"
                                            class="btn btn-success btn-pill mb-3">Tambah Pembayaran</a>
                                        @else
                                        <div id="countdown"></div>
                                        @endif
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Bulan</th>
                                                    <th scope="col">Tanggal Mulai</th>
                                                    <th scope="col">Tanggal Berakhir</th>
                                                    <th scope='col'>Status Pembayaran</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; @endphp
                                                @foreach($pembayaran as $data)
                                                @php $no++; @endphp
                                                <tr>
                                                    <td scope='row'>{{$no}}</td>
                                                    <td>
                                                        @php
                                                            $bulan = explode(";", $data->bulan);
                                                        @endphp
                                                        @if ($data->status_bayar == 'Lunas' || $data->status_bayar ==
                                                        'Belum Bayar' || $data->status_bayar == 'Menunggu Konfirmasi' ||
                                                        $data->status_bayar == 'Sudah Transfer(Booking)' || $data->status_bayar == 'Booking')
                                                        {{Carbon\Carbon::now()->month($bulan[0])->isoFormat('MMMM')}}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data->status_bayar == 'Lunas' || $data->status_bayar ==
                                                        'Belum Bayar' || $data->status_bayar == 'Menunggu Konfirmasi'||
                                                        $data->status_bayar == 'Sudah Transfer(Booking)' || $data->status_bayar == 'Booking')
                                                            {{Carbon\Carbon::createFromFormat("Y-m-d H:i:s",
                                                            $data->tgl_bayar)->month($bulan[0])->year($bulan[1])->format("d-m-Y")}}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data->status_bayar == 'Lunas' || $data->status_bayar ==
                                                        'Belum Bayar' || $data->status_bayar == 'Menunggu Konfirmasi')
                                                            {{ Carbon\Carbon::createFromFormat("Y-m-d H:i:s",
                                                            $data->tgl_bayar)->month($bulan[0])->year($bulan[1])->addMonth(1)->format("d-m-Y")}}
                                                        @elseif($data->status_bayar == 'Booking')
                                                            {{Carbon\Carbon::createFromFormat("Y-m-d H:i:s",
                                                            $data->tgl_bayar)->month($bulan[0])->year($bulan[1])->addDay(1)->format("d-m-Y")}}
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>{{$data->status_bayar}}</td>
                                                    <td>
                                                        @if (status($data->status_bayar))
                                                        <a href="/pembayaran/{{$data->id}}"
                                                            class="btn btn-primary mb-3"><i class=" fas fa-file"></i>
                                                            Detail</a>
                                                        @else
                                                        <a href="/booking/{{$data->id}}" class="btn btn-primary mb-3"><i
                                                                class=" fas fa-file"></i> Detail</a>
                                                        @endif
                                                        @if ($data->status_bayar == "Diterima")
                                                        <a href="/notapembayaran/{{$data->id}}">
                                                            <button class="btn btn-danger mb-3"><i
                                                                    class=" fas fa-print"></i> Nota Pembayaran</button>
                                                        </a>
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
@section('script')
<script>
    CountDownTimer('{{$ids->tgl_bayar}}', 'countdown');
        function CountDownTimer(dt, id)
        {
            var end = new Date('{{$ids->tenggat}}');
            var _second = 1000;
            var _minute = _second * 60;
            var _hour = _minute * 60;
            var _day = _hour * 24;
            var timer;
            function showRemaining() {
                var now = new Date();
                var oneDay = 1000 * 60 * 60 * 24;
                var distance = end - now;
                var mathdistance = Math.round(distance / oneDay);
                if (mathdistance < 7) {
                    document.getElementById(id).innerHTML = '<a href="{{ route('pembayaran.create', $ids->id)}}" class="btn btn-success btn-pill mb-3">Tambah Pembayaran</a>';
                } else {
                    document.getElementById(id).innerHTML = '<a href="{{ route('pembayaran.create', $ids->id)}}" class="btn btn-success btn-pill mb-3 disabled" aria-disabled="true">Tambah Pembayaran</a>';
                }
            }
            timer = setInterval(showRemaining, 1000);
        }
</script>
@endsection