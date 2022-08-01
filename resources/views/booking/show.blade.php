<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Booking')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5">
                    <div class="project-info-box mt-0" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <h5 style="font-size: 1.25rem;">Detail Booking</h5>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>Silahkan transfer pada rekening berikut :</b></p>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>BCA : 033278142 a.n. Suyatik</b></p>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Nama Pelanggan: </b>{{$pembayaran->nama_penyewa}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Kamar yang ditempati: </b>{{$pembayaran->nama_kost}}</p>
                        {{-- <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Tanggal Bayar: </b>{{$pembayaran->tgl_bayar}}</p> --}}
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Biaya Booking: </b>Rp. 50000</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Tanggal Masuk: </b>{{$pembayaran->tgl_masuk}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Status: </b>{{$pembayaran->status_bayar}}</p>
                        {{-- @php
                        $total_fasilitas += $row->fasilitas->harga;
                        @endphp --}}

                        <!-- <p class="mb-0"><b>Budget:</b> $500</p> -->
                    </div><!-- / project-info-box -->

                    <div class="project-info-box mt-0 mb-0">
                        @if (Auth::user()->role_id == '6')
                        @if($pembayaran->status_bayar != 'Diterima')
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Konfirmasi Pembayaran
                        </button>
                        {{-- <a href="/notabooking/{{$pembayaran->kost_id}}">
                        <button class="btn btn-danger">Nota Booking</button>
                        </a> --}}
                        @endif
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/pembayaran/konfirmasi/{{$pembayaran->id}}" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <input required name="bukti" id="bukti" type="file" class="form-control @error('bukti') is-invalid @enderror" onchange="previewbukti(this)">
                                            @error('bukti')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                            <input name="status" value="Sudah Transfer(Booking)" type="hidden">
                                            <img src="" id="previewbukti" style="max-width: 350px; margin-top: 10px;">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end modal -->
                    </div>
                </div><!-- / column -->

                <div class="col-md-7">
                    <img src="{{url('/images')}}/{{$pembayaran->bukti}}" alt="Belum Ada Bukti Pembayaran" class="rounded" style="width: auto; max-width: 100%; height: 500px;-webkit-backface-visibility: hidden;">
                    <!-- <div class="project-info-box">
                        <p><b>Categories:</b> Design, Illustration</p>
                        <p><b>Skills:</b> Illustrator</p>
                    </div>/ project-info-box -->
                </div><!-- / column -->
            </div>
        </div>
    </section><!-- End Breadcrumbs -->
</main>

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