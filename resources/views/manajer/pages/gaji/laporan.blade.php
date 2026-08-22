@extends('manajer.index')

@section('content')
<div>
    <div class="m-2">
        <a class="btn btn-primary btn-sm" href="{{route('manajer.gaji')}}">Kembali</a>
    </div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Laporan Gaji</h5>
            <h6>Periode : {{$bulan}} {{$tahun}}</h6>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Jumlah Gaji</th>
                        <th>Tanggal Bayar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gaji as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama_lengkap}}</td>
                        <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$item->karyawan->jabatan->departemen->nama_departemen}}</td>
                        <td>Rp {{ number_format($item->total_gaji, 0, ',', '.') }}</td>
                        <td>{{ $item->tanggal_bayar->locale('id')->translatedFormat('d F Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Belum ada pencairan gaji</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-5">
                <p>Total Gaji Karyawan : <strong>Rp {{ number_format($totalAll, 0, ',', '.') }}</strong></p>
                <p>Jumlah Karyawan : <strong>{{$totalKaryawan}}</strong></p>
            </div>
        </div>
        <!-- Data Cuti -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
