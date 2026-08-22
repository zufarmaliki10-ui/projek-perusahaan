@extends('hrd.index')

@section('content')
<div class="m-2">
    <a class="btn btn-primary" href="{{route('HRD.cuti')}}">Kembali</a>
</div>
<div class="card p-3 col-md-6 mx-auto my-3">
    @if ($cuti->status == 'disetujui')
    <h3 class="text-center">Surat Cuti Karyawan</h3>
    @else
    <h3 class="text-center">Surat Penolakan Cuti Karyawan</h3>
    @endif
    <h5 class="text-center">PT. MyOffice Indonesia</h5>
    <hr />
    <p>Nama Karyawan : {{$cuti->karyawan->nama_lengkap}}</p>
    <p>NIP : {{$cuti->karyawan->nip}}</p>
    <p>Departemen : {{$cuti->karyawan->jabatan->departemen->nama_departemen}}</p>
    <p>Jabatan : {{$cuti->karyawan->jabatan->nama_jabatan}}</p>
    <hr />
    <p>Tanggal Mulai Cuti : {{$cuti->tanggal_mulai->locale('id')->translatedFormat('d-F-Y')}}</p>
    <p>Tanggal Selesai Cuti : {{$cuti->tanggal_selesai->locale('id')->translatedFormat('d-F-Y')}}</p>
    <p>Alasan : {{$cuti->alasan}}</p>
    @if ($cuti->status == 'disetujui')
    <p>Maka dengan ini, pengajuan cuti karyawan atas nama <strong>{{$cuti->karyawan->nama_lengkap}}</strong> telah disetujui.</p>
    <p>Harap kembali masuk kantor sesuai tanggal yang sudah disepakati bersama, terimakasih.</p>
    @elseif ($cuti->status == 'ditolak')
    <p>Maka dengan ini, pengajuan cuti karyawan atas nama <strong>{{$cuti->karyawan->nama_lengkap}}</strong> untuk saat ini belum kami setujui.</p>
    <p>Kami selaku pimpinan memohon maaf atas pengajuan anda, dikarenakan pengajuan cuti tidak sesuai dengan SOP cuti kantor, terimakasih.</p>
    @endif
    <div class="d-flex justify-content-end">
        <div>
            <p>Yogyakarta, {{$cuti->updated_at->locale('id')->translatedFormat('d F Y')}}</p>
            @if ($cuti->status == 'disetujui')
            <h6 class="text-center">Disetujui Oleh,</h6>
            @elseif ($cuti->status == 'ditolak')
            <h6 class="text-center">Ditolak Oleh,</h6>
            @endif
            <h6 class="text-center mt-5">({{$cuti->disetujui_oleh}})</h6>
        </div>
    </div>
</div>
@endsection
