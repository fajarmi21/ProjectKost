<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Edit Data Fasilitas')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Edit Data Fasilitas</h5>
            <div class="card-body">
                <form action="{{route('fasilitas.update', $fasilitas->id)}}" method="post" enctype="multipart/form-data">
                    <!--  untuk keamanan -->
                    @method('PUT')
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="fasilitas" style="font-weight: bold;">Fasilitas</label>
                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" value="{{$fasilitas->fasilitas}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="harga" style="font-weight: bold;">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="{{$fasilitas->harga}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="ket_fas" style="font-weight: bold;">Keterangan</label>
                                <input type="text" class="form-control" id="ket_fas" name="ket_fas" value="{{$fasilitas->ket_fas}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="foto" style="font-weight: bold;">Foto Fasilitas</label>
                                <input name="foto" id="foto" type="file" class="form-control" onchange="previewfoto(this)">
                                <img src="{{url('/images')}}/{{$fasilitas->foto}}" id="previewfoto" style="max-width: 350px; margin-top: 10px;">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

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