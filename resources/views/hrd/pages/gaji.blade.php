@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Data Gaji Karyawan</h5>
            <div class="d-flex justify-content-between my-3">
                <select class="form-select w-25" name="" id="">
                    <option value="">-- Pilih Bulan --</option>
                </select>
                <a class="btn btn-primary btn-sm bi bi-plus align-content-center" href="{{route('HRD.gaji.input')}}">Input Gaji Karyawan</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Total Gaji</th>
                        <th>Status Pencairan</th>
                        <th>Tanggal Cair</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Heru</td>
                        <td>Karyawan</td>
                        <td>Media & Publikasi</td>
                        <td>Rp10.000.000,00</td>
                        <td>
                            <span class="badge text-bg-warning">Menunggu</span>
                        </td>
                        <td>10 Oktober</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Heru</td>
                        <td>Karyawan</td>
                        <td>Media & Publikasi</td>
                        <td>Rp10.000.000,00</td>
                        <td>
                            <span class="badge text-bg-success">Terkirim</span>
                        </td>
                        <td>10 Oktober</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Data Cuti -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection