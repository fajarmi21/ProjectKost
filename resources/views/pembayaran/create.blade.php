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
                                    <form action="{{ route('pembayaran.store')}}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="nama_penyewa" class="">
                                                    <p style="font-weight: bold;">Nama Pelanggan</p>
                                                </label>
                                                <input name="nama_penyewa" id="nama_penyewa" type="text"
                                                    class="form-control" value="{{Auth::user()->name}}" readonly>
                                                <input name="user_id" id="user_id" type="hidden" class="form-control"
                                                    value="{{Auth::user()->id}}">
                                                <input name="tgl_booking" id="tgl_booking"
                                                    value="{{$pembayaran->tgl_booking}}" class="form-control" readonly
                                                    type="hidden">
                                                <input name="tgl_masuk" id="tgl_masuk"
                                                    value="{{$pembayaran->tgl_masuk}}" class="form-control" readonly
                                                    type="hidden">
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="nama_kost" class="">
                                                    <p style="font-weight: bold;">Nama Kamar</p>
                                                </label>
                                                <input name="" id="nama_kost" type="text" class="form-control"
                                                    value="{{$pembayaran->nama_kost}}" readonly>
                                                <input name="kost_id" id="kost_id" value="{{$pembayaran->kost_id}}"
                                                    type="hidden">
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="bulan" style="font-weight: bold;">Ajukan Sewa Per
                                                    Bulan</label>
                                                <div class="input-group mb-3">
                                                    <input name="bulan" id="bulan" type="number" min="1"
                                                        class="form-control" value="1" onchange="Maxim(this.value)">
                                                    <span class="input-group-text">{{number_format($pembayaran->kharga,
                                                        0 ,"," ,".")}}</span>
                                                </div>
                                                <input id="subtotal" value="{{ $pembayaran->kharga }}" class="form-control" readonly type="hidden">
                                            </div>
                                            <div>
                                                <label for="fas" style="font-weight: bold;">Fasilitas Tambahan untuk Per
                                                    Bulan</label>
                                                @foreach ($fasilitas as $item)
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">{{$item->fasilitas}}</span>
                                                    <input type="number" name="fas[{{ $item->id }}]" id="numFas"
                                                        class="form-control" min="0" value="0" max="1" onchange="subTotal({{ $item->id }}, this.value, {{ $item->harga }})">
                                                    <span class="input-group-text">{{number_format($item->harga, 0 ,","
                                                        ,".")}}</span>
                                                </div>
                                                <input id="sub{{ $item->id }}" value="0" class="form-control" readonly type="hidden">
                                                @endforeach
                                            </div>
                                            <div class="position-relative form-group mt-4 entry-content">
                                                <label for="nama_kost" class="" style="font-weight: bold;">Total</label>
                                                <input name="" id="total" type="text" class="form-control"
                                                    value="{{ number_format($pembayaran->kharga, 0 ," ," ,".") }}"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="fas" style="font-weight: bold;">Metode Pembayaran</label>
                                                <select class="js-states form-control"
                                                    id="mp" name="mp">
                                                    <option id="1" value="1" selected>Per bulan</option>
                                                    <option id="2" value="1">Semua</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-4"><i
                                                    class="pe-7s-diskette"></i> Simpan Data</button>
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
<script type="text/javascript">
    var total = {'subtotal': {{ $pembayaran->kharga }}};
    function Maxim(val) {
        $('input[id=numFas]').attr('max', val);
        $('input[id=subtotal]').attr('value', val * {{ $pembayaran->kharga }});
        Total('subtotal', val * {{ $pembayaran->kharga }});

        $('#mp').children('[id="2"]').attr('value', val);
    }

    function subTotal(id, val, harga) {
        $('input[id=sub'+id+']').attr('value', val * harga);
        Total('sub'+id, val * harga);
    }

    function Total(id, subtotal) {
        total[id] = subtotal;
        var sum = 0;
        for (const [key, value] of Object.entries(total)) {
            sum += value;
        }

        $('input[id=total]').attr('value', sum.toLocaleString('id'));
    }
</script>
<!-- End #main -->
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