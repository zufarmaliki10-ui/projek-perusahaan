@extends('karyawan.index')

@section('content')
<div class="m-2">
    <a class="btn btn-primary btn-sm no-print" href="{{route('karyawan.gaji')}}">Kembali</a>
    <button class="btn btn-primary btn-sm no-print bi bi-printer-fill" onclick="window.print()"><span class="mx-1">Cetak Slip</span></button>
</div>
<div class="card p-3 col-md-6 mx-auto my-3 slip-gaji">
    <h3 class="text-center">Slip Gaji Karyawan</h3>
    <h5 class="text-center">PT. MyOffice Indonesia</h5>
    <hr />
    <p>Nama Karyawan : {{$gaji->karyawan->nama_lengkap}}</p>
    <p>NIP : {{$gaji->karyawan->nip}}</p>
    <p>Departemen : {{$gaji->karyawan->jabatan->departemen->nama_departemen}}</p>
    <p>Jabatan : {{$gaji->karyawan->jabatan->nama_jabatan}}</p>
    <p>Periode Gaji : {{$gaji->bulan}} {{$gaji->tahun}}</p>
    <p>Bank Karyawan : {{$gaji->karyawan->bank}}</p>
    <p>Rekening Karyawan : {{$gaji->karyawan->nomer_rekening}}</p>
    <hr />
    <div class="d-flex justify-content-between">
        <div>
            <p>Gaji Pokok :</p>
            <p>Tunjangan :</p>
            <p>Uang Lembur :</p>
        </div>
        <div>
            <p>Rp {{number_format($gaji->gaji_pokok, 0, ',', '.')}}</p>
            <p>Rp {{number_format($gaji->tunjangan, 0, ',', '.')}}</p>
            <p>Rp {{number_format($gaji->lembur, 0, ',', '.')}}</p>
        </div>
    </div>
    <hr />
    <div class="d-flex justify-content-between">
        <div>
            <p>Total Gaji :</p>
        </div>
        <div>
            <p>Rp {{number_format($gaji->total_gaji, 0, ',', '.')}}</p>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div>
            <p>Yogyakarta, @if ($gaji->tanggal_bayar)
                {{ $gaji->tanggal_bayar->locale('id')->translatedFormat('d F Y') }}
                @else
                Belum dibayar
                @endif
            </p>
            <h6 class="text-center">Mengetahui,</h6>
            <h6 class="text-center mb-5">Kepala HRD Perusahaan</h6>
            <h6 class="text-center mt-5">({{$gaji->nama_hrd}})</h6>
        </div>
    </div>
</div>
@endsection