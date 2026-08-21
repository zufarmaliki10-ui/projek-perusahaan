@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Data Karyawan</h5>
            <div class="d-flex justify-content-between my-3">
                <select class="form-select w-50" aria-label="Default select example">
                    <option selected>-- Pilih Departemen --</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <a href="{{route('HRD.karyawan.create')}}" class="btn btn-primary bi bi-plus">Tambah Data Karyawan</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($karyawan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_lengkap}}</td>
                            <td>{{$item->jabatan->departemen->nama_departemen}}</td>
                            <td>{{$item->jabatan->nama_jabatan}}</td>
                            <td>{{$item->tanggal_masuk}}</td>
                            <td>
                                <span class="badge text-bg-success">Aktif</span>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-success bi bi-arrow-repeat" href=""></a>
                                <a class="btn btn-sm btn-danger bi bi-trash-fill" href=""></a>
                                <a class="btn btn-sm btn-primary bi bi-eye-fill" href=""></a>
                                <a class="btn btn-sm btn-warning bi bi-person-plus-fill" href=""></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data tidak ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Perusahaan -->
</div>
@endsection