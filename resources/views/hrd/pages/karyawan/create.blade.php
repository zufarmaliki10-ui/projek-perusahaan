@extends('hrd.index')

@section('content')
<div class="col-md-8 mx-auto my-3">
    <a class="btn btn-sm btn-primary bi bi-arrow-left my-2" href="{{route('HRD.karyawan')}}"><span class="mx-1">Kembali</span></a>
    <h3>Tambah Karyawan</h3>
    <form action="{{route('HRD.karyawan.store')}}" method="post">
        @csrf
        <label class="form-label mt-2" for="nama_lengkap">Nama Lengkap Karyawan</label>
        <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap">
        <label class="form-label mt-2" for="nip">NIP</label>
        <input class="form-control" type="text" name="nip" id="nip">
        <label class="form-label mt-2" for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
            <option value="laki-laki">Laki - Laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <label class="form-label mt-2" for="no_telp">No. Telp</label>
        <input class="form-control" type="text" name="no_telp" id="no_telp">
        <label class="form-label mt-2" for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat karyawan..."></textarea>
        <label class="form-label mt-2" for="departemen">Departemen</label>
        <select class="form-select" name="departemen" id="departemen">
            <option value="">-- Pilih Departemen --</option>
            @foreach ($departemen as $item)
            <option value="{{$item->id}}">{{$item->nama_departemen}}</option>
            @endforeach
        </select>
        <label class="form-label mt-2" for="jabatan">Jabatan</label>
        <select class="form-select" name="id_jabatan" id="jabatan">
            <option value="">-- Pilih Departemen Terlebih Dahulu --</option>
        </select>
        <label class="form-label mt-2" for="tanggal_masuk">Tanggal Masuk</label>
        <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk">
        <label class="form-label mt-2" for="status">Status</label>
        <select class="form-select" name="status" id="status">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Non-Aktif</option>
        </select>
        <div class="my-3 justify-content-center d-flex">
            <button class="btn btn-primary w-50" type="submit">Tambah Karyawan</button>
        </div>
    </form>
</div>
@endsection