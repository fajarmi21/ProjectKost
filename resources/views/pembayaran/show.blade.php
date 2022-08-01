<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Pembayaran')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {{-- {{ dd(getFasilitas('45')) }} --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="margin-top:20px;">
                <div class="col-md-5">
                    <div class="project-info-box mt-0" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <h5 style="font-size: 1.25rem;">Detail Pembayaran</h5>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>Silahkan transfer pada rekening berikut :</b></p>
                        <p class="mb-0" style="font-family: 'Barlow', sans-serif !important; font-weight: 300; font-size: 1rem; color: #686c6d;letter-spacing: 0.03rem;margin-bottom: 10px;"><b>BCA : 033278142 a.n. Suyatik</b></p>
                    </div><!-- / project-info-box -->

                    <div class="project-info-box" style=" margin: 15px 0; background-color: #fff; padding: 30px 40px; border-radius: 5px;">
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Nama Pelanggan: </b>{{$pembayaran->nama_penyewa}}</p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Kamar yang ditempati: </b>{{$pembayaran->nama_kost}}</p>
                        <!-- <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Tanggal Bayar: </b>{{$pembayaran->tgl_bayar}}</p> -->
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Pembayaran untuk bulan: </b>{{Carbon\Carbon::now()->month($pembayaran->bulan)->isoFormat('MMMM')}}</p>
                        @php
                        $harga_kost = $pembayaran->kost->harga;
                        $total_fasilitas = $total_biaya = 0;
                        $total_biaya = $harga_kost
                        @endphp
                        {{-- @if(empty($cek->fas_id))
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Total Pembayaran: </b>Rp. {{ $harga_kost}}</p>
                        @else
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Total Pembayaran: </b>Rp. {{ $total_biaya}}</p>
                        @endif --}}
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Status: </b>{{$pembayaran->status_bayar}}</p>
                        <p>
                            <div class="row">
                                <div class="col-12"><b>Detail Pembayaran: </b></div>
                                <div class="col-6">Harga per bulan</div>
                                <div class="col-6" style="text-align: end">Rp. {{ $harga_kost }}</div>
                                @foreach(getFasilitas($pembayaran->id ) as $row)
                                @php
                                $total_biaya += $row->harga;
                                @endphp
                                <div class="col-6">{{$row->fasilitas}}</div>
                                <div class="col-6" style="text-align: end">Rp. {{$row->harga}}</div>
                                @endforeach
                                <div class="col-6"><b>Total</b></div>
                                <div class="col-6" style="text-align: end"><b>Rp. {{$total_biaya}}</b></div>
                            </div>
                            <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"></p>
                        </p>
                        {{-- <b>Fasilitas :</b>
                        @foreach(listsFasilitas($pembayaran->tgl_bayar ) as $row)
                        {{ $loop->first ? '' : ', ' }}
                        <span style="margin-bottom: 15px; padding-bottom: 15px; solid #d5dadb;">{{$row->fasilitas}}</span>
                        @endforeach --}}
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
                        {{-- <a href="/notapembayaran/{{$pembayaran->id}}">
                        <button class="btn btn-danger">Nota Pembayaran</button>
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
                                            <input name="status" id="status" value="Sudah Transfer" type="hidden">
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