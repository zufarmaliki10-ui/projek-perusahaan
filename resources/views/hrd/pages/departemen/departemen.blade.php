@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <div class="d-flex justify-content-between my-3">
                <h5 class="align-content-center">Data Departemen</h5>
                <a href="{{route('HRD.departemen.create')}}" class="btn btn-primary bi bi-plus">Tambah Data Departemen</a>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Departemen</th>
                            <th>Jumlah Karyawan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departemen as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_departemen}}</td>
                            <td>10</td>
                            <td>
                                <span class="badge {{ $item->status == 'aktif' ? 'text-bg-success' : 'text-bg-danger'}}">{{$item->status}}</span>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-sm mx-1 btn-success bi bi-arrow-repeat" href="{{route('HRD.departemen.edit', $item->id)}}"></a>
                                <a class="btn btn-sm mx-1 btn-primary bi bi-eye-fill" href="{{route('HRD.jabatan', $item->id)}}"></a>
                                <form action="{{route('HRD.departemen.destroy', $item->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm mx-1 btn-danger bi bi-trash-fill" onclick="return confirm('Anda yakin menghapus departemen ini?')"></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Data tidak ada</td>
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
