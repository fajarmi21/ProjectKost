<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Edit Data Pembayaran')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Edit Data Pembayaran</h5>
            <div class="card-body">
                <form action="/pembayaran/update/{{$pembayaran->id}}" method="post" enctype="multipart/form-data">
                    <!--  untuk keamanan -->
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="nama_penyewa" style="font-weight: bold;">nama_penyewa</label>
                                <input type="text" class="form-control" id="al" name="nama_penyewa"
                                    value="{{$pembayaran->jenis_kelamin}}" placeholder="Masukkan jenis_kelamin"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="bukti" style="font-weight: bold;">bukti</label>
                                <input type="file" class="form-control" id="bukti" name="ktp"
                                    onchange="previewKartuKeluarga(this)">
                                <img src="{{url('/images')}}/{{$pembayaran->bukti}}" alt="" id="previewkk"
                                    style="max-width: 130px; margin-top: 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <label for="ktp" style="font-weight: bold;">Foto KTP</label>
                            <label for="status_bayar" class="">
                                <p style="font-weight: bold;">Status Pembayaran</p>
                            </label>
                            <div class="col-sm-5">
                                <select name="status_bayar" class="form-control">
                                    <option>-Pilih Status Pembayaran-</option>
                                    <option>Diterima</option>
                                    <option>Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Update Data</button>
                    <a href="/pembayaran" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

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