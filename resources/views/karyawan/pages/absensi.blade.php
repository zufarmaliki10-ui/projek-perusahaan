@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="card my-4 w-75 mx-auto p-4">
        <h2 class="text-center">Absensi Karyawan</h2>
        <h5 class="text-center" id="tanggal">Jam</h5>
        <h3 class="text-center" id="jam">Jam</h3>
        <select class="my-3 w-50 mx-auto form-select" name="" id="">
            <option value="">Hadir</option>
            <option value="">Izin</option>
            <option value="">Sakit</option>
        </select>
        <div class="text-center my-2">
            <p class="clock-in m-0 text-danger">Harap absen masuk sebelum jam 08.00</p>
            <p class="clock-out m-0 text-danger">Absen keluar pada pukul 17.00</p>
        </div>
        <div class="d-flex justify-content-center gap-3">
            <button class="btn btn-primary btn-sm">Masuk</button>
            <button class="btn btn-primary btn-sm">Pulang</button>
        </div>
    </div>
</section>
@endsection