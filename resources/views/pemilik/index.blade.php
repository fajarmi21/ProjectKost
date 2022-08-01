<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Pemilik')
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
                            <h3 class="card-title">Data Pemilik</h3>
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
                                                    <th scope='col'>Username</th>
                                                    <th scope='col'>Alamat</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no = 0; @endphp
                                            @foreach($pemilik as $data)
                                            @php $no++; @endphp
                                                <tr>
                                                    <input type="hidden" class="delete_val_id" value="{{$data->id}}">
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$data->users['name']}}</td>
                                                    <td>{{$data->alamat}}</td>
                                                    <td>
                                                        <a href="/pemilik/{{$data->id}}" role='button'>
                                                            <i class="fas fa-file-contract bg-primary p-2 text-white rounded" data-toggle="tooltip" title="Detail"></i>
                                                        </a>
                                                        @if($data->status == 0)
                                                        <a href="/pemilik/{{$data->id}}/edit" role="button">
                                                            <i class="fas fa-file-signature bg-warning p-2 text-white rounded" data-toggle="tooltip" title="Edit"></i>
                                                        </a>
                                                        <a role="button">
                                                            <i class="fas fa-trash-alt bg-danger p-2 text-white rounded delete" nama="{{$data->users['name']}}" data-toggle="tooltip" title="Hapus"></i>
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
        $(document).ready(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                }
            });
            $('.delete').click(function(){
                var nama = $(this).attr('nama');
                var delete_id = $(this).closest("tr").find('.delete_val_id').val();
                swal({
                    title: "Apakah Anda yakin ?",
                    text: "Menghapus data pemilik dengan nama "+nama+" ??",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var data = {
                            "_token": $('input[name=_token]').val(),
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "GET",
                            url: '/pemilik/delete/'+delete_id,
                            data: data,
                            success: function(redirect){
                                swal("Data Pemilik Berhasil Di Hapus!", {
                                    icon: "success",
                                })
                                .then((result) => {
                                    location.reload();
                                });
                            }

                        });
                    }
                });

            });
        });
    </script>
@endsection