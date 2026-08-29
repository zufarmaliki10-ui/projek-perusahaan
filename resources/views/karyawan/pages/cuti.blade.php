@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="card p-2 col-md-6 mx-auto my-3">
        <h4>Form Pengajuan Cuti Karyawan</h4>
        <form action="{{route('karyawan.cuti.store')}}" method="post">
            @csrf
            <label class="form-label">Nama</label>
            <input
                class="form-control"
                type="text"
                value="{{$karyawan->nama_lengkap}}" readonly />
            <div class="d-flex justify-content-between">
                <div class="form-tgl my-2">
                    <label class="form-label" for="tanggal_mulai">Mulai Cuti</label>
                    <input class="form-control"
                        type="date"
                        name="tanggal_mulai"
                        id="tanggal_mulai"
                        min="{{date('Y-m-d')}}"
                        required />
                </div>
                <div class="form-tgl my-2">
                    <label class="form-label" for="tanggal_selesai">Akhir Cuti</label>
                    <input class="form-control"
                        type="date"
                        name="tanggal_selesai"
                        id="tanggal_selesai"
                        min="{{date('Y-m-d')}}"
                        required />
                </div>
            </div>
            <label class="form-label" for="alasan">Rincian Cuti</label>
            <textarea
                class="form-control"
                name="alasan"
                id="alasan"
                placeholder="masukkan rincian cuti anda.."></textarea>
            <button type="submit" class="btn btn-primary d-block w-50 mx-auto my-3">Kirim Pengajuan Cuti</button>
        </form>
    </div>
</section>
@endsection