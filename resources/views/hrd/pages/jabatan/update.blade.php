@extends('hrd.index')

@section('content')
<div class="col-md-8 col-sm-10 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.jabatan',['departemen' => $departemen->id])}}"><span class="mx-1">Kembali</span></a>
    <h3>Ubah Data Jabatan</h3>
    <form action="{{route('HRD.jabatan.update', ['departemen'=>$departemen->id, 'jabatan'=>$jabatan->id])}}" method="post">
        @csrf
        @method('PUT')
        <label class="form-label mt-2" for="nama_jabatan">Nama Jabatan</label>
        <input class="form-control" type="text" name="nama_jabatan" id="nama_jabatan" value="{{$jabatan->nama_jabatan}}">
        <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
        <input class="form-control" type="number" name="gaji_pokok" id="gaji_pokok" value="{{$jabatan->gaji_pokok}}">
        <label class="form-label" for="tunjangan}}">Tunjangan</label>
        <input class="form-control" type="number" name="tunjangan" id="tunjangan" value="{{$jabatan->tunjangan}}">
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-success w-50" type="submit">Ubah Data Jabatan</button>
        </div>
    </form>
</div>
@endsection