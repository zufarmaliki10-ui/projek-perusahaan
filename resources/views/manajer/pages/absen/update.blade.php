@extends('manajer.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Validasi -->
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Validasi Absensi Karyawan</h5>
            <p class="text-danger">
                Harap diisi saat karyawan sudah hadir di kantor
            </p>
            <div class="card p-2 mx-auto my-3">
                <h4>Form Validasi Absen Karyawan</h4>
                <form class="" action="">
                    <label class="form-label" for="nama">Nama</label>
                    <input
                        class="form-control"
                        type="text"
                        id="nama"
                        placeholder="Nama Lengkap Karyawan" />
                    <label class="form-label" for="nama">Hari/Tanggal</label>
                    <input class="form-control" type="date" id="nama" />
                    <label class="form-label" for="nama">Pilih Validasi</label>
                    <select
                        class="form-select mb-3"
                        aria-label="Default select example">
                        <option selected>-- Validasi Absen --</option>
                        <option value="1">Hadir</option>
                        <option value="2">Izin</option>
                        <option value="3">Sakit</option>
                        <option value="4">Alfa</option>
                    </select>
                    <label class="form-label" for="">Rincian Tugas</label>
                    <textarea
                        class="form-control"
                        name=""
                        id=""
                        placeholder="masukkan rincian cuti anda.."></textarea>
                    <a class="btn btn-success d-block w-50 mx-auto my-3" href="">Validasi</a>
                </form>
            </div>
        </div>
        <!-- Validasi -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
