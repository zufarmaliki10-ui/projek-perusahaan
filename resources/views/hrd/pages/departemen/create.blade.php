@extends('hrd.index')

@section('content')
<div class="col-md-8 col-sm-10 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.departemen')}}"><span class="mx-1">Kembali</span></a>
    <h3>Tambah Departemen</h3>
    <form action="{{route('HRD.departemen.store')}}" method="post">
        @csrf
        <label class="form-label mt-2" for="nama_departemen">Nama Departemen</label>
        <input class="form-control" type="text" name="nama_departemen" id="nama_departemen">
        <label class="form-label mt-2" for="status">Status</label>
        <select class="form-select" name="status" id="status">
            <option value="Aktif">Aktif</option>
            <option value="Non-Aktif">Non-Aktif</option>
        </select>
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-primary w-50" type="submit">Tambah Departemen</button>
        </div>
    </form>
</div>
@endsection