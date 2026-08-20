@extends('manajer.index')

@section('content')
<div class="card p-3 col-md-6 mx-auto my-3">
    <h3 class="text-center">Slip Gaji Karyawan</h3>
    <h5 class="text-center">PT. MyOffice Indonesia</h5>
    <hr />
    <p>Nama Karyawan :</p>
    <p>NIP :</p>
    <p>Departemen :</p>
    <p>Jabatan :</p>
    <p>Periode Gaji :</p>
    <p>Bank Karyawan :</p>
    <p>Rekening Karyawan :</p>
    <hr />
    <div class="d-flex justify-content-between">
        <div>
            <p>Gaji Pokok :</p>
            <p>Tunjangan :</p>
            <p>Uang Lembur :</p>
        </div>
        <div>
            <p>Rp 3500000</p>
            <p>Rp 3500000</p>
            <p>Rp 3500000</p>
        </div>
    </div>
    <hr />
    <div class="d-flex justify-content-between">
        <div>
            <p>Total Gaji :</p>
        </div>
        <div>
            <p>Rp 3500000</p>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div>
            <p>Yogyakarta, 16 Oktober 2025</p>
            <h6 class="text-center">Mengetahui,</h6>
            <h6 class="text-center mb-5">Nama HRD</h6>
            <h6 class="text-center mt-5">(.................................)</h6>
        </div>
    </div>
    <a class="btn btn-primary mt-3" href="">Kirim</a>
</div>
@endsection