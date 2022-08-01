<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data User')
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
                            <h3 class="card-title">Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="table-responsive">
                                        <a href="{{ route('user.create') }}" class="btn btn-success btn-pill mb-3">Tambah Admin</a>
                                        <table id="example" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th scope='col'>Username</th>
                                                    <th scope='col'>Email</th>
                                                    <th scope='col'>Level</th>
                                                    <th scope='col'>Tanggal Buat</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $no = 0; @endphp
                                            @foreach($user as $usr)
                                            @php $no++; @endphp
                                                <tr>
                                                    <th scope='row'>{{$no}}</th>
                                                    <td>{{$usr->name}}</td>
                                                    <td>{{$usr->email}}</td>
                                                    <td>
                                                        @if($usr->role_id == 1)
                                                            Admin
                                                            @elseif ($usr->role_id == 4)
                                                            Pengunjung
                                                            @elseif($usr->role_id == 5)
                                                            Pemilik
                                                            @elseif($usr->role_id == 6)
                                                            Penyewa
                                                        @endif
                                                    </td>
                                                    <td>{{$usr->created_at}}</td>
                                                    <td>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('user.destroy', $usr->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            @if ($usr->role_id == 5)
                                                            <button type="submit" class="fas fa-trash-alt bg-danger p-2 text-white rounded delete" title="hapus" disabled></button>
                                                            @else
                                                            <button type="submit" class="fas fa-trash-alt bg-danger p-2 text-white rounded delete" title="hapus"></button>
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
