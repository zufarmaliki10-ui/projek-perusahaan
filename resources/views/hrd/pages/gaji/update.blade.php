@extends('hrd.index')

@section('content')
<div>
    <div class="d-flex justify-content-between m-3">
        <a
            href="validasi_cuti.html"
            class="btn btn-primary btn-sm bi bi-arrow-left">
            <span class="mx-2">Kembali ke halaman sebelumnya</span>
        </a>
        <div class="d-flex justify-content-end gap-2">
            <button
                class="btn btn-secondary btn-sm bi bi-arrow-left"></button>
            <button
                class="btn btn-secondary btn-sm bi bi-arrow-right"></button>
        </div>
    </div>
    <!-- Data Karyawan -->
    <div class="row gap-3 mx-1 rounded-2">
        <div class="card col-md-10 mx-auto my-1 p-3">
            <h4>Data Diri Karyawan</h4>
            <p>Nama Karyawan : {{$gaji->karyawan->nama_lengkap}}</p>
            <p>NIP : {{$gaji->karyawan->nip}}</p>
            <p>Departemen : {{$gaji->karyawan->jabatan->departemen->nama_departemen}}</p>
            <p>Jabatan : {{$gaji->karyawan->jabatan->nama_jabatan}}</p>
            <p>Periode Gaji : {{$gaji->bulan}} {{$gaji->tahun}}</p>
            <p>Bank Karyawan :</p>
            <p>Rekening Karyawan :</p>
        </div>
        <div class="card col-md-10 mx-auto my-1 p-3">
            <h4>Rincian Gaji Karyawan</h4>
            <form action="{{route('HRD.gaji.update', $gaji->id)}}" method="post">
                @csrf
                @method('PUT')
                <label class="form-label mt-2" for="">Gaji Pokok</label>
                <input id="gajiPokok" class="form-control" type="number" value="{{$gaji->karyawan->jabatan->gaji_pokok}}" readonly />
                <label class="form-label mt-2" for="">Tunjangan</label>
                <input id="tunjangan" class="form-control" type="number" value="{{$gaji->karyawan->jabatan->tunjangan}}" readonly />
                <label class="form-label mt-2" for="lembur">Uang Lembur</label>
                <input id="uangLembur" class="form-control" type="number" name="lembur" placeholder="Masukkan uang lembur karyawan..." />
                <label class="form-label mt-2" for="tanggal_bayar">Tanggal Bayar</label>
                <input id="tanggal_bayar" class="form-control" type="date" name="tanggal_bayar" />
                <hr />
                <div class="d-flex justify-content-between">
                    <h5>Total Gaji</h5>
                    <h5 id="total">Rp 0</h5>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Lihat Slip</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
