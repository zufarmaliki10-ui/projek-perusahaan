@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Data Pengajuan Cuti Karyawan</h5>
            <select class="form-select my-2 w-25" name="" id="">
                <option value="">-- Pilih Bulan --</option>
            </select>
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
                        <th>Action</th>
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
                            <span class="badge text-bg-warning">Menunggu</span>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('HRD.cuti.show')}}">Lihat Pengajuan</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Heru</td>
                        <td>Karyawan</td>
                        <td>Media & Publikasi</td>
                        <td>10 OKtober 2025</td>
                        <td>20 OKtober 2025</td>
                        <td>
                            <span class="badge text-bg-success">Diterima</span>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('HRD.cuti.show')}}">Lihat Pengajuan</a>
                        </td>
                    </tr>
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
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('HRD.cuti.show')}}">Lihat Pengajuan</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Data Cuti -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection