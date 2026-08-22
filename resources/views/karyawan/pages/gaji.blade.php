@extends('karyawan.index')

@section('content')
<section class="main">
    <div class="table-responsive col-md-10 mx-auto p-3">
        <h4 class="text-center my-3">Slip Gaji Karyawan</h4>
        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th>Total Gaji</th>
                    <th>Tanggal Cair</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($gaji as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->bulan}}</td>
                    <td>{{$item->tahun}}</td>
                    <td>Rp {{number_format($item->total_gaji, 0, ',', '.')}}</td>
                    <td>{{$item->tanggal_bayar->locale('id')->translatedFormat('d F Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm bi bi-printer-fill" href="{{route('karyawan.gaji.show', $item->id)}}"></a>
                        <a class="btn btn-primary btn-sm bi bi-download" href="{{route('karyawan.gaji.download', $item->id)}}"></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Gaji belum dicairkan</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
