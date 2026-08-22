@extends('hrd.index')

@section('content')
<div class="col-md-8 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.karyawan')}}"><span class="mx-1">Kembali</span></a>
    <h3>Tambah Karyawan</h3>
    <form action="{{route('HRD.karyawan.update', $karyawan->id)}}" method="post">
        @csrf
        @method('PUT')
        <label class="form-label mt-2" for="nama_lengkap">Nama Lengkap Karyawan</label>
        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" value="{{$karyawan->nama_lengkap}}">
        <label class="form-label mt-2" for="nip">NIP</label>
        <input class="form-control" type="text" name="nip" id="nip" value="{{$karyawan->nip}}">
        <label class="form-label mt-2" for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
            <option value="laki-laki" {{$karyawan->jenis_kelamin == 'laki-laki' ? 'selected' : ''}}>Laki - Laki</option>
            <option value="perempuan" {{$karyawan->jenis_kelamin == 'perempuan' ? 'selected' : ''}}>Perempuan</option>
        </select>
        <label class="form-label mt-2" for="no_telp">No. Telp</label>
        <input class="form-control" type="text" name="no_telp" id="no_telp" value="{{$karyawan->no_telp}}">
        <label class="form-label mt-2" for="bank">Bank</label>
        <input class="form-control" type="text" name="bank" id="bank" value="{{$karyawan->bank}}">
        <label class="form-label mt-2" for="nomer_rekening">Nomer Rekening</label>
        <input class="form-control" type="text" name="nomer_rekening" id="nomer_rekening" value="{{$karyawan->nomer_rekening}}">
        <label class="form-label mt-2" for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat karyawan...">{{$karyawan->alamat}}</textarea>
        <label class="form-label mt-2" for="departemen">Departemen</label>
        <select class="form-select" name="departemen" id="departemen">
            <option value="">-- Pilih Departemen --</option>
            @foreach ($departemen as $item)
            <option value="{{$item->id}}" {{$item->id == $karyawan->jabatan->id_departemen ? 'selected' : ''}}>{{$item->nama_departemen}}</option>
            @endforeach
        </select>
        <label class="form-label mt-2" for="jabatan">Jabatan</label>
        <select class="form-select" name="id_jabatan" id="jabatan">
            @foreach ($karyawan->jabatan->departemen->jabatan as $item)
            <option value="{{$item->id}}" {{$item->id == $karyawan->id_jabatan ? 'selected' : ''}}>{{$item->nama_jabatan}}</option>
            @endforeach
        </select>
        <label class="form-label mt-2" for="tanggal_masuk">Tanggal Masuk</label>
        <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk" value="{{$karyawan->tanggal_masuk}}">
        <label class="form-label mt-2" for="status">Status</label>
        <select class="form-select" name="status" id="status">
            <option value="aktif" {{$karyawan->status == 'aktif' ? 'selected' : ''}}>Aktif</option>
            <option value="non-aktif" {{$karyawan->status == 'non-aktif' ? 'selected' : ''}}>Non-Aktif</option>
        </select>
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-primary w-50" type="submit">Tambah Karyawan</button>
        </div>
    </form>
</div>
@endsection
