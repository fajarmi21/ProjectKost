<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Tambah Data User')
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
                            <h3 class="card-title">Input Data User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-12 col-lg-8 entries">
                                @csrf
                                <article class="entry">
                                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="position-relative form-group">
                                                    <label for="name" style="font-weight: bold;">Nama</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan Nama" required>
                                                    @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                                <div class="position-relative form-group">
                                                    <label for="name" style="font-weight: bold;">Email</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="email" name="email" placeholder="Masukan Email" required>
                                                    @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                                <div class="position-relative form-group">
                                                    <label for="name" style="font-weight: bold;">Role</label>
                                                    <input type="text" value="Admin" class="form-control" id="role_id" name="role_id" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Simpan Data</button>
                                    </form>
                                </article>
                            </div><!-- End blog entries list -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection
