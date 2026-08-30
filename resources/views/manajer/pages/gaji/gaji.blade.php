@extends('manajer.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Data Gaji Karyawan</h5>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Jumlah Karyawan</th>
                        <th>Total Gaji</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gaji as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->bulan}}</td>
                        <td>{{$item->jumlah_karyawan}}</td>
                        <td>Rp {{ number_format($item->total_gaji, 0, ',', '.') }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm bi bi-eye-fill"
                                href="{{route('manajer.gaji.laporan', ['bulan' => $item->bulan, 'tahun' => $item->tahun])}}"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Rekap Gaji"></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Belum ada pencairan gaji</td>
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
