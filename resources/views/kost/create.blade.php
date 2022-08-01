<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Tambah Data Kamar')
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
                            <h3 class="card-title">Input Data Kamar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-12 col-lg-8 entries">
                                <article class="entry">
                                    <form action="{{route('kost.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="nama_kost" class="">
                                                <p style="font-weight: bold;">Kamar</p>
                                            </label>
                                            <input required name="nama_kost" id="nama_kost" type="text" placeholder="Masukkan Nama Kamar" class="form-control @error('nama_kost') is-invalid @enderror">
                                            @error('nama_kost')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <input name="status" id="status" type="hidden" value="Tersedia" class="form-control">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="kategori_kost" class="">
                                                <p style="font-weight: bold;">Kategori Kamar</p>
                                            </label>
                                            <select required name="kategori_kost" class="form-control @error('kategori_kost') is-invalid @enderror">
                                                @error('kategori_kost')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                                <option>-Pilih Kategori Kamar-</option>
                                                <option>Putra</option>
                                                <option>Putri</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fasilitas" class="">
                                                <p style="font-weight: bold;">Fasilitas</p>
                                            </label>
                                            <input required name="fasilitas" id="fasilitas" type="text" placeholder="Masukkan fasilitas apa saja didalam kost" class="form-control @error('fasilitas') is-invalid @enderror">
                                            @error('fasilitas')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="ketereangan" class="">
                                                <p style="font-weight: bold;">Keterangan</p>
                                            </label>
                                            <input required name="keterangan" id="keterangan" type="text" placeholder="Masukkan Keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                                            @error('keterangan')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="harga" class="">
                                                <p style="font-weight: bold;">Harga Sewa</p>
                                            </label>
                                            <input required name="harga" id="harga" type="text" placeholder="Masukkan harga sewa" class="form-control @error('harga') is-invalid @enderror">
                                            @error('harga')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input required name="fotokost" id="fotokost" type="file" class="form-control @error('fotokost') is-invalid @enderror" onchange="previewfotokost(this)">
                                            <label for="fotokost2" class="">
                                                <p style="font-weight: bold;">Foto Kamar(Opsional)</p>
                                            </label>
                                            <input required name="fotokost2" id="fotokost2" type="file" class="form-control @error('fotokost2') is-invalid @enderror" onchange="previewfotokost(this)">

                                            @error('fotokost')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            @error('fotokost2')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <img src="" id="previewfotokost" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4"><i class="pe-7s-diskette"></i> Simpan Data</button>
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
@section('script')
<script>
    function previewfotokost(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewfotokost').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection