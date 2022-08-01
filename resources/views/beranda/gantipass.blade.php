<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Ganti Password')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Ganti Password</h5>
            <div class="card-body">
                <form action="{{route('profil.update', $user->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="position-relative form-group">
                                <label for="email" style="font-weight: bold;">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                            </div>
                            <div class="position-relative form-group">
                                <label for="password" style="font-weight: bold;">Password Baru</label>
                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" autocomplete="new-password">
                            </div>
                            <div class="position-relative form-group">
                                <label for="password-confirmirmation" style="font-weight: bold;">Konfirmasi Password</label>
                                <input id="password-confirmirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Simpan Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
