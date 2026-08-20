@extends('hrd.index')

@section('content')
<div>
    <div class="d-flex justify-content-between m-3">
        <a
            href="validasi_cuti.html"
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
            <form action="">
                <label class="form-label mt-2" for="">Pilih Departemen</label>
                <select class="form-control" name="" id="">
                    <option value=""></option>
                </select>
                <label class="form-label mt-2" for="">Pilih Nama Karyawan</label>
                <select class="form-control" name="" id="">
                    <option value=""></option>
                </select>
                <label class="form-label mt-2" for="">Periode Gaji</label>
                <select class="form-control" name="" id="">
                    <option value=""></option>
                </select>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{route('HRD.gaji.create')}}" class="btn btn-primary">Lanjutkan</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
