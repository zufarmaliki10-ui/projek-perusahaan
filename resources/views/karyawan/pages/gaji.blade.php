@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="table-responsive col-md-10 mx-auto p-3">
        <h4 class="text-center my-3">Slip Gaji Karyawan</h4>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Total Gaji</th>
                    <th>Tanggal Cair</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Oktober</td>
                    <td>Rp.3.500.000,00</td>
                    <td>10 Oktober 2026</td>
                    <td>
                        <a class="btn btn-primary btn-sm bi bi-printer-fill" href=""><span class="mx-1">Cetak</span></a>
                        <a class="btn btn-primary btn-sm bi bi-download" href=""><span class="mx-1">Download</span></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection