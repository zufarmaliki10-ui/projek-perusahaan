@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.karyawan')}}"><span class="mx-1">Kembali</span></a>
            <h5>Data Karyawan</h5>
            <div class="d-flex mt-3 border border-1 border-dark-subtle p-3 rounded-4" style="width:max-content">
                <div class="mx-3">
                    <p>Nama Lengkap</p>
                    <p>NIP</p>
                    <p>Jenis Kelamin</p>
                    <p>No. Telp</p>
                    <p>Bank</p>
                    <p>Nomer Rekening</p>
                    <p>Alamat</p>
                    <p>Departemen</p>
                    <p>Jabatan</p>
                    <p>Tanggal Masuk</p>
                    <p>Status</p>
                </div>
                <div class="mx-3">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="mx-3">
                    <p>{{$karyawan->nama_lengkap}}</p>
                    <p>{{$karyawan->nip}}</p>
                    <p>{{$karyawan->jenis_kelamin}}</p>
                    <p>{{$karyawan->no_telp}}</p>
                    <p>{{$karyawan->bank}}</p>
                    <p>{{$karyawan->nomer_rekening}}</p>
                    <p>{{$karyawan->alamat}}</p>
                    <p>{{$karyawan->jabatan->departemen->nama_departemen}}</p>
                    <p>{{$karyawan->jabatan->nama_jabatan}}</p>
                    <p>{{$karyawan->tanggal_masuk}}</p>
                    <p>{{$karyawan->status}}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
</div>
@endsection
