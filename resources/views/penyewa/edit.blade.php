<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Edit Data Penyewa')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Edit Data Penyewa</h5>
            <div class="card-body">
                <form action="{{ route('penyewa.update', $penyewa->id)}}" method="post" enctype="multipart/form-data">
                    <!--  untuk keamanan -->
                    @method('patch')
                    @csrf
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="name" style="font-weight: bold;">Nama</label>
                                <select name="user_id" id="" class="form-control">
                                    <option value="{{$penyewa->user_id}}">{{$penyewa->users->name}}</option>
                                    @foreach($user as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="ktp" style="font-weight: bold;">Foto KTP</label>
                                <input type="file" class="form-control" id="ktp" name="ktp" onchange="previewKartuKeluarga(this)" >
                                <img src="{{url('/images')}}/{{$penyewa->ktp}}" alt="" id="previewkk" style="max-width: 130px; margin-top: 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="jenis_kelamin" style="font-weight: bold;">Jenis Kelamin</label>
                                <input type="text" class="form-control" id="al" name="jenis_kelamin" value="{{$penyewa->jenis_kelamin}}" placeholder="Masukkan jenis_kelamin" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="alamat" style="font-weight: bold;">Alamat</label>
                                <input type="text" class="form-control" id="al" name="alamat" value="{{$penyewa->alamat}}" placeholder="Masukkan alamat" required>
                            </div>
                        </div>
                        </div>
                        <div class="form row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="no_hp" style="font-weight: bold;">No Telepon</label>
                                <input type="text" class="form-control" id="al" name="no_hp" value="{{$penyewa->no_hp}}" placeholder="Masukkan no_hp" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="tgl_lahir" style="font-weight: bold;">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{$penyewa->tgl_lahir}}" placeholder="Masukkan tgl_lahir" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Update Data</button>
                    <a href="/penyewa" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

@section('script')
<script>
    function previewKTP(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewktp').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
