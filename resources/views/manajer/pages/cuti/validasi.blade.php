@extends('manajer.index')

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
        <div class="card col-md-10 mx-auto my-2 p-3">
            <h4>Detail Pengajuan Cuti</h4>
            <form action="">
                <label class="form-label mt-2" for="">Nama Karyawan</label>
                <input class="form-control" type="text" readonly />
                <label class="form-label mt-2" for="">Departemen</label>
                <input class="form-control" type="text" readonly />
                <label class="form-label mt-2" for="">Jabatan</label>
                <input class="form-control" type="text" readonly />
                <div class="d-flex gap-3">
                    <div class="my-2 w-50">
                        <label class="form-label" for="">Mulai Cuti</label>
                        <input class="form-control" type="date" />
                    </div>
                    <div class="my-2 w-50">
                        <label class="form-label" for="">Akhir Cuti</label>
                        <input class="form-control" type="date" />
                    </div>
                </div>
                <label class="form-label" for="">Rincian Cuti</label>
                <textarea
                    class="form-control"
                    name=""
                    id=""
                    readonly></textarea>
                <label class="form-label mt-2" for="">Disetujui Oleh</label>
                <input class="form-control" type="text" />
                <div class="mt-3 d-flex gap-2 justify-content-end">
                    <button class="btn btn-sm btn-success">ACC Cuti</button>
                    <button class="btn btn-sm btn-danger">Tolak Cuti</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Data Karyawan -->
</div>
@endsection