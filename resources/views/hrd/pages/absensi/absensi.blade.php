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
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Status Validasi</th>
                        <th>Validator</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->karyawan->nama_lengkap}}</td>
                        <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$item->tanggal->locale('id')->translatedFormat('d M Y')}}</td>
                        <td>{{$item->jam_masuk}}</td>
                        <td>{{$item->jam_keluar}}</td>
                        <td>
                            <span @class([ 'badge' , 'text-bg-secondary'=> $item->status == 'Sakit',
                                'text-bg-danger' => $item->status == 'Alfa',
                                'text-bg-success' => $item->status == 'Hadir',
                                'text-bg-warning' => $item->status == 'Izin',
                                ])>{{$item->status}}</span>
                        </td>
                        <td>
                            <span @class([ 'badge' , 'text-bg-warning'=> $item->status_validasi == 'Menunggu',
                                'text-bg-danger' => $item->status_validasi == 'Ditolak',
                                'text-bg-success' => $item->status_validasi == 'Disetujui',
                                ])>{{$item->status_validasi}}</span>
                        </td>
                        <td>{{$item->validator}}</td>
                        <td>
                            <a class="btn btn-success btn-sm bi bi-check-circle"
                                href="{{route('HRD.absensi.validasi', $item->id)}}"
                                data-bs-toggle="tooltip" data-bs-placement="top"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Validasi Absen"></a>
                            <a class="btn btn-primary btn-sm bi bi-eye-fill"
                                href="{{route('HRD.absensi.show', $item->id)}}"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                data-bs-custom-class="custom-tooltip"
                                data-bs-title="Lihat Bukti Absen"></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Karyawan belum absen</td>
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
