<!-- menampilkan berdasarkan file index di folder layouts  -->
@extends('layouts.index')
<!-- section untu title  -->
@section('title', 'Profil')
<!-- section untuk content  -->
@section('content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="card">
            <h5 class="card-header">Profil</h5>
            <div class="card-body">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="position-relative form-group">
                            <label for="nama" style="font-weight: bold;">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="position-relative form-group">
                            <label for="email" style="font-weight: bold;">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
                        </div>
                        <div class="position-relative form-group">
                            <label for="role_id" style="font-weight: bold;">Role</label>
                            <input type="text" class="form-control" id="role_id" name="role_id" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url()->previous() }}" class="btn btn-danger mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                <a href="/ganti-password/{{$user->id}}" class="btn btn-primary mb-3"></i> Ganti Password</a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
