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

                        <div class="row">
                            @foreach($kost as $data)
                            <div class="col-md-3">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="card">
                                            <img src="{{url('/images')}}/{{$data->fotokost}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$data->nama_kost}}</h5>
                                                <p class="card-text">{{$data->kategori}}</p>
                                                <a href="/kost/{{$data->id}}" class="btn btn-info">Detail</a>
                                                <a href="/booking/create/{{$data->id}}" class="btn btn-primary">Booking</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection


    @section('script')
    <script>
        $(document).ready(function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content')
                }
            });
            $('.delete').click(function() {
                var nama = $(this).attr('nama');
                var delete_id = $(this).closest("tr").find('.delete_val_id')
                    .val();
                swal({
                        title: "Apakah anda yakin ?",
                        text: "Menghapus data kost yang anda pilih ??",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name=_token]')
                                    .val(),
                                "id": delete_id,
                            };
                            $.ajax({
                                type: "GET",
                                url: '/kost/delete/' +
                                    delete_id,
                                data: data,
                                success: function(redirect) {
                                    swal("Data Kost Berhasil Di Hapus!", {
                                            icon: "success",
                                        })
                                        .then((result) => {
                                            location
                                                .reload();
                                        });
                                }

                            });
                        }
                    });

            });
        });
    </script>
    @endsection