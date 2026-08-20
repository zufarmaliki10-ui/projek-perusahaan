@extends('hrd.index')

@section('content')
<div>
    <!-- Selamat Datang -->
    <div class="d-flex justify-content-between">
        <h4 class="p-3 m-3 text-center">Selamat Datang, HRD</h4>
        <div class="time border rounded-4 p-3 m-3 text-center">
            <h6 id="tanggal"></h6>
            <h4 id="jam"></h4>
        </div>
    </div>
    <!-- Selamat Datang -->
    <!-- Card Info -->
    <div class="row mx-2 my-4">
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-success d-flex">
                        <i class="bi bi-people-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Jumlah Karyawan</h5>
                        <h6 class="m-0">10</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-info d-flex">
                        <i class="bi bi-building-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Jumlah Departemen</h5>
                        <h6 class="m-0">5</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-warning d-flex">
                        <i
                            class="bi bi-file-earmark-text-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Surat Cuti</h5>
                        <h6 class="m-0">2</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Info -->
    <!-- Data Perusahaan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Data Absensi Karyawan</h5>
            <p>Tanggal : </p>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Jam Masuk</th>
                            <th>Status</th>
                            <th>Validasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Heru</td>
                            <td>Karyawan</td>
                            <td>08.00</td>
                            <td>
                                <span class="badge text-bg-success">Hadir</span>
                            </td>
                            <td>
                                <span class="badge text-bg-success">Validasi</span>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Heri</td>
                            <td>Karyawan</td>
                            <td>08.15</td>
                            <td>
                                <span class="badge text-bg-warning">Terlambat</span>
                            </td>
                            <td>
                                <span class="badge text-bg-danger">Belum Validasi</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
    <!-- Data Perusahaan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Data Karyawan Cuti</h5>
            <p>Bulan : </p>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status Cuti</th>
                            <th>Disetujui / Ditolak Oleh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Heru</td>
                            <td>Karyawan</td>
                            <td>
                                <span class="badge text-bg-success">Diterima</span>
                            </td>
                            <td>HRD</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Heri</td>
                            <td>Karyawan</td>
                            <td>
                                <span class="badge text-bg-danger">Ditolak</span>
                            </td>
                            <td>Manajer</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
</div>
@endsection