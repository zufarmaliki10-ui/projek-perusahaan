@extends('hrd.index')

@section('content')
<div class="col-md-8 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.karyawan')}}"><span class="mx-1">Kembali</span></a>
    <h3>Buat Akun Karyawan</h3>
    <form action="{{route('HRD.karyawan.account', $karyawan->id)}}" method="post">
        @csrf
        <label class="form-label mt-2" for="name">Nama Karyawan</label>
        <input class="form-control" type="text" name="name" id="name" value="{{$karyawan->nama_lengkap}}" readonly>
        <label class="form-label mt-2" for="email">Email</label>
        <input class="form-control" type="email" name="email" id="email" required>
        <label class="form-label mt-2" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password" required>
        <label class="form-label mt-2" for="password">Konfirmasi Password</label>
        <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-primary w-50" type="submit">Buat Akun Karyawan</button>
        </div>
    </form>
</div>
@endsection
