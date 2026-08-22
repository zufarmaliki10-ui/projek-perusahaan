@extends('hrd.index')

@section('content')
<div>
    <div class="d-flex justify-content-between m-3">
        <a
            href="{{route('HRD.cuti')}}"
            class="btn btn-primary btn-sm bi bi-arrow-left">
            <span class="mx-2">Kembali ke halaman sebelumnya</span>
        </a>
        <div class="d-flex justify-content-end gap-2">
            <button
                class="btn btn-secondary btn-sm bi bi-arrow-left"></button>
            <button
                class="btn btn-secondary btn-sm bi bi-arrow-right"></button>
        </div>
    </div>
    <!-- Data Karyawan -->
    <div class="row gap-3 mx-1 rounded-2">
        <div class="card col-md-10 mx-auto my-2 p-3">
            <h4>Detail Pengajuan Cuti</h4>
            <form action="{{route('HRD.cuti.update', $cuti->id)}}" method="post">
                @csrf
                @method('PUT')
                <label class="form-label mt-2" for="">Nama Karyawan</label>
                <input class="form-control" type="text" value="{{$cuti->karyawan->nama_lengkap}}" readonly />
                <label class="form-label mt-2" for="">Departemen</label>
                <input class="form-control" type="text" value="{{$cuti->karyawan->jabatan->departemen->nama_departemen}}" readonly />
                <label class="form-label mt-2" for="">Jabatan</label>
                <input class="form-control" type="text" value="{{$cuti->karyawan->jabatan->nama_jabatan}}" readonly />
                <div class="d-flex gap-3">
                    <div class="my-2 w-50">
                        <label class="form-label" for="">Mulai Cuti</label>
                        <input class="form-control" type="text" value="{{$cuti->tanggal_mulai->locale('id')->translatedFormat('d F Y')}}" readonly />
                    </div>
                    <div class="my-2 w-50">
                        <label class="form-label" for="">Akhir Cuti</label>
                        <input class="form-control" type="text" value="{{$cuti->tanggal_selesai->locale('id')->translatedFormat('d F Y')}}" readonly />
                    </div>
                </div>
                <label class="form-label" for="">Rincian Cuti</label>
                <textarea
                    class="form-control"
                    name=""
                    id=""
                    readonly>{{$cuti->alasan}}</textarea>
                <select
                    class="form-select mt-3"
                    name="status"
                    id="status"
                    aria-label="Default select example">
                    <option value="menunggu" {{$cuti->status == 'menunggu' ? 'selected' : ''}}>Menunggu</option>
                    <option value="disetujui" {{$cuti->status == 'disetujui' ? 'selected' : ''}}>Disetujui</option>
                    <option value="ditolak" {{$cuti->status == 'ditolak' ? 'selected' : ''}}>Ditolak</option>
                </select>
                <label class="form-label mt-2" for="disetujui_oleh">Disetujui Oleh</label>
                <input class="form-control" type="text" name="disetujui_oleh" id="disetujui_oleh"/>
                <div class="mt-3 d-flex gap-2 justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
