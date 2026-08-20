@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5 class="mb-3">Data Departemen</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th>Jumlah Karyawan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Media & Publikasi</td>
                            <td>10</td>
                            <td>
                                <span class="badge text-bg-success">Aktif</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
</div>
@endsection
