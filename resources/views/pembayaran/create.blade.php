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
                            <h3 class="card-title">Input Pembayaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="row">

                            <div class="col-md-12 col-lg-8 entries">
                                @csrf
                                <article class="entry">
                                    <form action="{{ route('pembayaran.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="nama_penyewa" class="">
                                                    <p style="font-weight: bold;">Nama Pelanggan</p>
                                                </label>
                                                <input name="nama_penyewa" id="nama_penyewa" type="text" class="form-control" value="{{Auth::user()->name}}" readonly>
                                                <input name="user_id" id="user_id" type="hidden" class="form-control" value="{{Auth::user()->id}}">
                                                <input name="tgl_booking" id="tgl_booking" value="{{$pembayaran->tgl_booking}}" class="form-control" readonly type="hidden">
                                                <input name="tgl_masuk" id="tgl_masuk" value="{{$pembayaran->tgl_masuk}}" class="form-control" readonly type="hidden">
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="nama_kost" class="">
                                                    <p style="font-weight: bold;">Nama Kamar</p>
                                                </label>
                                                <input name="" id="nama_kost" type="text" class="form-control" value="{{$pembayaran->nama_kost}}" readonly>
                                                <input name="kost_id" id="kost_id" value="{{$pembayaran->kost_id}}" type="hidden">
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="bulan" style="font-weight: bold;">Jumlah Bulan</label>
                                                <input name="bulan" id="bulan" type="number" min="1" class="form-control" value="1" onchange="Maxim(this.value)">
                                            </div>
                                            <div>
                                                <label for="fas" style="font-weight: bold;">Fasilitas Tambahan</label>
                                                @foreach ($fasilitas as $item)
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">{{$item->fasilitas}}</span>
                                                    <input type="number" name="fas[{{ $item->id }}]" id="numFas" class="form-control" min="0" value="0" max="1">
                                                    <span class="input-group-text">{{number_format($item->harga, 0 ,"," ,".")}}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="fas" style="font-weight: bold;">Fasilitas Tambahan</label>
                                                <select class="js-example-theme-multiple js-states form-control" id="fas_id" name="fas_id[]" multiple="multiple">

                                                    @if ($pembayaran->fas_id == "")
                                                        @foreach ($fasilitas as $item)
                                                        <option value="{{$item->id }}"> {{$item->fasilitas}} - {{$item->harga}}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach ($fasilitas as $item)
                                                            @if(in_array($item->id, $Idfasilitas))
                                                            <option value="{{$item->id }}" selected> {{$item->fasilitas}}</option>
                                                            @else
                                                            <option value="{{$item->id }}"> {{$item->fasilitas}} - {{$item->harga}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div> --}}
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
<script>
    function Maxim(val) {
        console.log(val);
        $('input[id=numFas]').attr('max', val);
    }
</script>
@endsection
@section('script')
<script>
    function previewbukti(input) {
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function() {
                $('#previewbukti').attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection