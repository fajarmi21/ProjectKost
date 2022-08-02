<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Edit Data Kost')
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
                            <h3 class="card-title">Edit Data Kost</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="row">
                            <div class="col-md-12 col-lg-8 entries">
                                @csrf
                                <article class="entry">
                                    <form action="{{ route('kost.update', $kost->id) }}" method="post" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="nama_kost" class="">
                                                <p style="font-weight: bold;">Nama Kost</p>
                                            </label>
                                            <input name="nama_kost" id="nama_kost" type="text" placeholder="Masukkan Nama Kost" value="{{ $kost->nama_kost }}" class="form-control">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="kategori_kost" class="">
                                                <p style="font-weight: bold;">Kategori Kost</p>
                                            </label>
                                            <select name="kategori_kost" class="form-control">
                                                <option>{{ $kost->kategori_kost }}</option>
                                                <option>Putra</option>
                                                <option>Putri</option>
                                                <option>Campuran/umum</option>
                                            </select>
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fasilitas" class="">
                                                <p style="font-weight: bold;">Fasilitas</p>
                                            </label>
                                            <input name="fasilitas" id="fasilitas" type="text" placeholder="Masukkan fasilitas apa saja didalam kost" value="{{ $kost->fasilitas }}" class="form-control">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="ketereangan" class="">
                                                <p style="font-weight: bold;">Keterangan</p>
                                            </label>
                                            <input name="keterangan" id="keterangan" type="text" placeholder="Masukkan Keterangan" value="{{ $kost->keterangan }}" class="form-control">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="harga" class="">
                                                <p style="font-weight: bold;">Harga Sewa</p>
                                            </label>
                                            <input name="harga" id="harga" type="text" placeholder="Masukkan harga sewa perhari, perminggu, perbulan atau menyesuaikan dengan keadaan" value="{{ $kost->harga }}" class="form-control">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost" id="fotokost" type="file" class="form-control" onchange="previewfotokost(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost}}" id="previewfotokost" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost2" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost2" id="fotokost2" type="file" class="form-control" onchange="previewfotokost2(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost2}}" id="previewfotokost2" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost3" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost3" id="fotokost3" type="file" class="form-control" onchange="previewfotokost3(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost3}}" id="previewfotokost3" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost4" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost4" id="fotokost4" type="file" class="form-control" onchange="previewfotokost4(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost4}}" id="previewfotokost4" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost5" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost5" id="fotokost5" type="file" class="form-control" onchange="previewfotokost5(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost5}}" id="previewfotokost5" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="position-relative form-group mt-4 entry-content">
                                            <label for="fotokost6" class="">
                                                <p style="font-weight: bold;">Foto Kamar</p>
                                            </label>
                                            <input name="fotokost6" id="fotokost6" type="file" class="form-control" onchange="previewfotokost6(this)">
                                            <img src="{{url('/images')}}/{{$kost->fotokost6}}" id="previewfotokost6" style="max-width: 350px; margin-top: 10px;">
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