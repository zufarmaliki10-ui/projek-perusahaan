@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Data Gaji Karyawan</h5>
            <div class="d-flex justify-content-between my-3">
                <select class="form-select w-25" name="" id="">
                    <option value="">-- Pilih Bulan --</option>
                </select>
                <a class="btn btn-primary btn-sm bi bi-plus align-content-center" href="{{route('HRD.gaji.create')}}">Input Gaji Karyawan</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Total Gaji</th>
                        <th>Tanggal Cair</th>
                        <th>Bukti Slip</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gaji as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama_lengkap}}</td>
                        <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$item->karyawan->jabatan->departemen->nama_departemen}}</td>
                        <td>Rp {{number_format($item->total_gaji, 0, ',', '.')}}</td>
                        <td>{{$item->tanggal_bayar->locale('id')->translatedFormat('d F Y')}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{route('HRD.gaji.show', $item->id)}}">Lihat Slip</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Belum ada input gaji bulan ini</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Data Cuti -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
