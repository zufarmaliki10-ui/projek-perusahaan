@extends('manajer.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Perusahaan -->
        <div class="table-responsive">
            <h5>Data Kehadiran Karyawan</h5>
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
        <!-- Data Perusahaan -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
