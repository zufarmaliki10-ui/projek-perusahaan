@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <div class="mb-4">
                <a class="btn btn-secondary btn-sm bi bi-arrow-left" href="{{route('HRD.departemen')}}"><span class="mx-1">Kembali ke Departemen</span></a>
            </div>
            <div class="d-flex justify-content-between my-2">
                <h5>{{$departemen->nama_departemen}}</h5>
                <a class="btn btn-primary btn-sm bi bi-plus" href="{{route('HRD.jabatan.create', $departemen->id)}}"><span>Tambah Jabatan</span></a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kepala Departemen</td>
                            <td>1000000</td>
                            <td>1000000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
</div>
@endsection
