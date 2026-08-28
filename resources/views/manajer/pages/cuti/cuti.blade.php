@extends('manajer.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Cuti -->
        <div class="table-responsive">
            <h5>Data Pengajuan Cuti Karyawan</h5>
            <select class="form-select my-2 w-25" name="" id="">
                <option value="">-- Pilih Bulan --</option>
            </select>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Mulai Cuti</th>
                        <th>Akhir Cuti</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cuti as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama_lengkap}}</td>
                        <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$item->karyawan->jabatan->departemen->nama_departemen}}</td>
                        <td>{{$item->tanggal_mulai->locale('id')->translatedFormat('d F Y')}}</td>
                        <td>{{$item->tanggal_selesai->locale('id')->translatedFormat('d F Y')}}</td>
                        <td>
                            <span @class([ 'badge' , 'text-bg-warning'=> $item->status == 'Menunggu',
                                'text-bg-danger' => $item->status == 'Ditolak',
                                'text-bg-success' => $item->status == 'Disetujui',
                                ])>{{$item->status}}</span>
                        </td>
                        <td>
                            @if ($item->status == 'Menunggu')
                            <a class="btn btn-warning btn-sm" href="{{route('manajer.cuti.validasi', $item->id)}}">Lihat Pengajuan</a>
                            @else
                            <a class="btn btn-primary btn-sm" href="{{route('manajer.cuti.show', $item->id)}}">Lihat Surat Cuti</a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Tidak ada pengajuan cuti</td>
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
