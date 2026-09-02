@extends('karyawan.index')

@section('content')
<section class="main">
    <!-- Absen Masuk -->
    <div id="absenMasuk" class="card my-4 w-75 mx-auto p-4">
        <form action="{{route('karyawan.absensi.masuk')}}" method="post">
            @csrf
            <h2 class="text-center">Absensi Karyawan</h2>
            <h5 class="text-center tanggal">Jam</h5>
            <h3 class="text-center jam">Jam</h3>
            <select class="my-3 w-50 mx-auto form-select" name="status" id="status">
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
            </select>
            <div id="keteranganIzin" class="d-none">
                <label class="form-label" for="keterangan">Keterangan: </label>
                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="berikan keterangan izin anda"></textarea>
            </div>
            <div class="text-center my-2">
                <p class="clock-in m-0 text-danger">Harap absen masuk sebelum jam 08.00</p>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
            </div>
        </form>
    </div>
    <!-- Absen Masuk -->
    <!-- Absen Pulang -->
    <div id="absenPulang" class="card my-4 w-75 mx-auto p-4">
        <form action="{{route('karyawan.absensi.keluar')}}" method="post">
            @csrf
            @method('PUT')
            <h2 class="text-center">Absensi Karyawan</h2>
            <h5 class="text-center tanggal">Jam</h5>
            <h3 class="text-center jam">Jam</h3>
            <label class="form-label" for="keterangan">Keterangan Kerja Hari Ini :</label>
            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="berikan laporan kerja anda hari ini..."></textarea>
            <div class="text-center my-2">
                <p class="clock-out m-0 text-danger">Absen keluar pada pukul 17.00, jangan lupa untuk mengisi form keterangan</p>
            </div>
            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
            </div>
        </form>
    </div>
    <!-- Absen Pulang -->
</section>
@endsection
