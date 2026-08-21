@extends('hrd.index')

@section('content')
<div>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <!-- Data Perusahaan -->
        <div class="table-responsive">
            <h5>Data Kehadiran Karyawan</h5>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Status Validasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama_lengkap}}</td>
                        <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$item->jam_masuk}}</td>
                        <td>{{$item->jam_keluar}}</td>
                        <td>
                            <span class="badge text-bg-success">{{$item->status}}</span>
                        </td>
                        <td>{{$item->status_validasi}}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{route('HRD.absensi.validasi', $item->id)}}">Validasi</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Data Perusahaan -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection
