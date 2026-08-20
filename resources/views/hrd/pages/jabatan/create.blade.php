@extends('hrd.index')

@section('content')
<div class="col-md-8 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.jabatan',['departemen' => $departemen->id])}}"><span class="mx-1">Kembali</span></a>
    <h3>Tambah Jabatan</h3>
    <form action="{{route('HRD.jabatan.store',['departemen' => $departemen->id])}}" method="post">
        @csrf
        <label class="form-label mt-2" for="nama_jabatan">Nama Jabatan</label>
        <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan">
        <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
        <input class="form-control" type="number" name="gaji_pokok" id="gaji_pokok">
        <label class="form-label" for="tunjangan">Tunjangan</label>
        <input class="form-control" type="number" name="tunjangan" id="tunjangan">
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-primary w-50" type="submit">Tambah Jabatan</button>
        </div>
    </form>
</div>
@endsection