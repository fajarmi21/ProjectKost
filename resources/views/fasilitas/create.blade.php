<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Data Tambah Fasilitas')
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
                            <h3 class="card-title">Input Fasilitas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="row">

                            <div class="col-md-12 col-lg-8 entries">
                                @csrf
                                <article class="entry">
                                    <form action="{{route('fasilitas.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="name" style="font-weight: bold;">Fasilitas</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="fasilitas" name="fasilitas" required>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="jenis_kelamin" style="font-weight: bold;">Harga</label>
                                                    <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="harga" name="harga" required>
                                                    @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="ket_fas" style="font-weight: bold;">Keterangan</label>
                                                    <input type="text" class="form-control @error('ket_fas') is-invalid @enderror" id="ket_fas" name="ket_fas" required>
                                                    @error('ket_fas')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="jenis_kelamin" style="font-weight: bold;">Foto Fasilitas</label>
                                                    <input required name="foto" id="foto" type="file" class="form-control @error('jenis_kelamin') is-invalid @enderror" onchange="previewfoto(this)">
                                                    <img src="" id="previewfoto" style="max-width: 350px; margin-top: 10px;">
                                                    @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Simpan Data</button>
                                    </form>
                                </article>
                            </div><!-- End blog entries list -->
                        </div>
                    </div>
    </section><!-- End Blog Section -->

</main>
<!-- End #main -->
@endsection
@section('script')
<script>
    function previewfoto(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewfoto').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection