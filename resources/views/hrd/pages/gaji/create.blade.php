@extends('hrd.index')

@section('content')
<div>
    <div class="d-flex justify-content-between m-3">
        <a
            href="{{route('HRD.gaji')}}"
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
        <div class="card col-md-10 mx-auto my-3 p-3">
            <h4>Input Gaji Karyawan</h4>
            <form action="{{route('HRD.gaji.store')}}" method="post">
                @csrf
                <select class="form-control" name="departemen" id="departemenGaji">
                    <option value="">-- Pilih Departemen --</option>
                    @foreach ($departemen as $item)
                    <option value="{{$item->id}}">{{$item->nama_departemen}}</option>
                    @endforeach
                </select>
                <select class="form-control mt-2" name="id_karyawan" id="karyawanGaji">
                    <option value="">-- Pilih Departemen terlebih dahulu --</option>
                </select>
                <label class="form-label mt-2" for="bulan">Bulan</label>
                <input class="form-control" type="text" name="bulan" id="bulan">
                <label class="form-label mt-2" for="tahun">Tahun</label>
                <input class="form-control" type="year" name="tahun" id="tahun">
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
