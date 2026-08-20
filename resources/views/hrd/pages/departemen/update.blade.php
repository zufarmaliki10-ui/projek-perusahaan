@extends('hrd.index')

@section('content')
<div class="col-md-8 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.departemen')}}"><span class="mx-1">Kembali</span></a>
    <h3>Edit Data Departemen</h3>
    <form action="{{route('HRD.departemen.update', $departemen->id)}}" method="post">
        @csrf
        @method('PUT')
        <label class="form-label mt-2" for="nama_departemen">Nama Departemen</label>
        <input class="form-control" type="text" name="nama_departemen" id="nama_departemen" value="{{$departemen->nama_departemen}}">
        <label class="form-label mt-2" for="status">Status</label>
        <select class="form-select" name="status" id="status">
            <option value="aktif">Aktif</option>
            <option value="non-aktif">Non-Aktif</option>
        </select>
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-success w-50" type="submit">Ubah Departemen</button>
        </div>
    </form>
</div>
@endsection