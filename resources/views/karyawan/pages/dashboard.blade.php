@extends('karyawan.index')

@section('content')
<section class="main">
    <!-- Selamat Datang -->
    <div class="d-flex justify-content-between">
        <h3 class="p-3 m-3 text-center">Selamat Datang, <strong class="text-decoration-underline">{{$karyawan->nama_lengkap}}</strong></h3>
        <div class="time card p-3 m-3 text-center">
            <h4 class="tanggal"></h4>
            <h4 class="jam"></h4>
        </div>
    </div>
    <!-- Selamat Datang -->
    <!-- Profil -->
    <div class="d-flex justify-content-center">
        <div
            class="profil overflow-hidden my-auto mx-2 rounded-3"
            style="border: 1px solid black">
            <img class="img-fluid" src="{{asset('visitor/img/profil.jpg')}}" alt="Profil Karyawan" />
        </div>
        <div
            class="identitas p-2 m-2 rounded-3"
            style="border: 1px solid black">
            <h5 class="text-center mb-4">Data Diri Karyawan</h5>
            <p>Nama Lengkap : {{$karyawan->nama_lengkap}}</p>
            <p>Jenis Kelamin : {{$karyawan->jenis_kelamin}}</p>
            <p>No. Telepon : {{$karyawan->no_telp}}</p>
            <p>Alamat : {{$karyawan->alamat}}</p>
        </div>
        <div
            class="identitas p-2 m-2 rounded-3"
            style="border: 1px solid black">
            <h5 class="text-center mb-4">Status Bekerja</h5>
            <p>NIP : {{$karyawan->nip}}</p>
            <p>Jabatan : {{$karyawan->jabatan->nama_jabatan}}</p>
            <p>Status : <span class="badge {{ $karyawan->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger'}}">{{$karyawan->status}}</span></p>
            <p>Tanggal Masuk : {{$karyawan->tanggal_masuk}}</p>
        </div>
        <div
            class="chart-container p-2 m-2 rounded-3"
            style="border: 1px solid black">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <!-- Profil -->
    <!-- Data Cuti -->
    <div class="table-responsive mx-4 my-2">
        <h5>Tabel Pengajuan Cuti</h5>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Mulai Cuti</th>
                    <th>Akhir Cuti</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Heru</td>
                    <td>Karyawan</td>
                    <td>Media & Publikasi</td>
                    <td>10 OKtober 2025</td>
                    <td>20 OKtober 2025</td>
                    <td>
                        <span class="badge text-bg-danger">Ditolak</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Data Cuti -->
</section>
@endsection
