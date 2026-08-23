@extends('hrd.index')

@section('content')
<div class="m-2">
    <a class="btn btn-primary" href="{{route('HRD.absensi')}}">Kembali</a>
</div>
<div class="card p-3 col-md-8 mx-auto my-3">
    <h2>Kartu Absensi Karyawan</h2>
    <hr>
    <p>Nama Karyawan : {{$absensi->karyawan->nama_lengkap}}</p>
    <p>NIP : {{$absensi->karyawan->nip}}</p>
    <p>Jabatan : {{$absensi->karyawan->jabatan->nama_jabatan}}</p>
    <p>Departemen : {{$absensi->karyawan->jabatan->departemen->nama_departemen}}</p>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Status Kehadiran</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Keterangan</th>
                    <th>Validator</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$absensi->status}}</td>
                    <td>{{$absensi->jam_masuk}}</td>
                    <td>{{$absensi->jam_keluar}}</td>
                    <td>{{$absensi->keterangan}}</td>
                    <td>{{$absensi->validator}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection