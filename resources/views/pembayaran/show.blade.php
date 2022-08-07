<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Detail Pembayaran')
<!-- section untuk content  -->
@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    {{-- {{ dd(getMFasilitas($pembayaran->id)) }} --}}
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
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Pembayaran untuk bulan: </b>
                            @if (count(explode(',', $pembayaran->bulan)) != 1)
                                @php
                                $no = 1;
                                $count = count(explode(',', $pembayaran->bulan));
                                @endphp
                                @foreach(explode(',', $pembayaran->bulan) as $bln)
                                @if ($no == $count)
                                {{Carbon\Carbon::now()->month($bln)->isoFormat('MMMM')}}
                                @else
                                {{Carbon\Carbon::now()->month($bln)->isoFormat('MMMM')}} ,
                                @php $no++ @endphp
                                @endif
                                @endforeach
                            @else
                                {{Carbon\Carbon::now()->month($pembayaran->bulan)->isoFormat('MMMM')}}
                            @endif
                        </p>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"><b>Status: </b>{{$pembayaran->status_bayar}}</p>
                        <p>
                        <div class="row">
                            @php
                            $harga_kost = count(explode(',', $pembayaran->bulan)) * $pembayaran->harga;
                            $total_fasilitas = $total_biaya = 0;
                            $total_biaya = $harga_kost
                            @endphp
                            <div class="col-12"><b>Detail Pembayaran: </b></div>
                            <div class="col-4">Biaya Kost</div>
                            <div class="col-4">{{ count(explode(',', $pembayaran->bulan)) }} bulan</div>
                            <div class="col-4" style="text-align: end">Rp {{ number_format(count(explode(',', $pembayaran->bulan)) * $pembayaran->harga, 0 ," ," ,".") }}</div>
                            @if (getMFasilitas($pembayaran->id)->cnt != null)
                                @foreach(explode(",", getMFasilitas($pembayaran->id)->cnt) as $row)
                                    @php
                                        $item = explode(":", $row);
                                        $total_biaya += $item[2];
                                    @endphp
                                    <div class="col-4">{{$item[0]}}</div>
                                    <div class="col-4">{{$item[1]}} buah</div>
                                    <div class="col-4" style="text-align: end">Rp {{ number_format($item[2], 0 ," ," ,".") }}</div>
                                @endforeach
                            @endif
                            <div class="col-4"></div>
                            <div class="col-4"><b>Total</b></div>
                            <div class="col-4" style="text-align: end"><b>Rp {{ number_format($total_biaya, 0 ," ," ,".") }}</b></div>
                        </div>
                        <p style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #d5dadb;"></p>
                        </p>
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