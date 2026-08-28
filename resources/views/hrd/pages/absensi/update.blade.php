@extends('hrd.index')

@section('content')
<div class="p-3">
    <!-- Validasi -->
    <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
        <a class="btn btn-primary btn-sm bi bi-arrow-left mb-2" href="{{route('HRD.absensi')}}"><span class="mx-1">Kembali</span></a>
        <div class="card p-2 mx-auto my-3">
            <h4>Form Validasi Absen Karyawan</h4>
            @if ($absensi->keterangan)
            <form action="{{route('HRD.absensi.update', $absensi->id)}}" method="post">
                @csrf
                @method('PUT')
                <label class="form-label mt-2" for="nama_lengkap">Nama</label>
                <input
                    class="form-control"
                    type="text"
                    name="nama_lengkap"
                    id="nama_lengkap"
                    placeholder="Nama Lengkap Karyawan"
                    value="{{$absensi->karyawan->nama_lengkap}}"
                    readonly />
                <label class="form-label mt-2" for="tanggal">Hari/Tanggal</label>
                <input class="form-control" type="date" name="tanggal" id="tanggal" value="{{$absensi->tanggal}}" readonly />
                <label class="form-label mt-2" for="keterangan">Rincian Tugas</label>
                <textarea
                    class="form-control"
                    name="keterangan"
                    id="keterangan"
                    readonly>{{$absensi->keterangan}}</textarea>
                <select
                    class="form-select mt-3"
                    name="status_validasi"
                    id="status_validasi"
                    aria-label="Default select example">
                    <option value="Menunggu" {{$absensi->status_validasi == 'Menunggu' ? 'selected' : ''}}>Menunggu</option>
                    <option value="Disetujui" {{$absensi->status_validasi == 'Disetujui' ? 'selected' : ''}}>Disetujui</option>
                    <option value="Ditolak" {{$absensi->status_validasi == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                </select>
                <button type="submit" class="btn btn-success d-block w-50 mx-auto my-3">Validasi</button>
            </form>
            @else
            <button class="btn btn-secondary" disabled>
                Menunggu karyawan input
            </button>
            @endif
        </div>
    </div>
    <!-- Validasi -->
</div>
@endsection