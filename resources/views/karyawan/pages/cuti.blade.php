@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="card p-2 col-md-6 mx-auto my-3">
        <h4>Form Pengajuan Cuti Karyawan</h4>
        <form class="" action="">
            <label class="form-label" for="nama">Nama</label>
            <input
                class="form-control"
                type="text"
                id="nama"
                placeholder="Nama Lengkap Karyawan" />
            <div class="d-flex justify-content-between">
                <div class="form-tgl my-2">
                    <label class="form-label" for="">Mulai Cuti</label>
                    <input class="form-control" type="date" />
                </div>
                <div class="form-tgl my-2">
                    <label class="form-label" for="">Akhir Cuti</label>
                    <input class="form-control" type="date" />
                </div>
            </div>
            <label class="form-label" for="">Rincian Cuti</label>
            <textarea
                class="form-control"
                name=""
                id=""
                placeholder="masukkan rincian cuti anda.."></textarea>
            <a class="btn btn-primary d-block w-50 mx-auto my-3" href="">Kirim Pengajuan Cuti</a>
        </form>
    </div>
</section>
@endsection