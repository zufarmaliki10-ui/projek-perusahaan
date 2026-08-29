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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jabatan as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama_jabatan}}</td>
                            <td>Rp {{number_format($item->gaji_pokok, 0, ',', '.')}}</td>
                            <td>Rp {{number_format($item->tunjangan, 0, ',', '.')}}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-sm mx-1 btn-success bi bi-arrow-repeat"
                                    href="{{route('HRD.jabatan.edit', ['departemen'=>$departemen->id, 'jabatan'=>$item->id])}}"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Ubah Data"></a>
                                <form action="{{route('HRD.jabatan.destroy', ['departemen'=>$departemen->id, 'jabatan'=>$item->id])}}" method="post" onsubmit="return alertConfirm(event, this, 'Data jabatan akan dihapus', 'Apakah anda yakin?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-sm mx-1 btn-danger bi bi-trash-fill"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Hapus Data"></button>
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
