@extends('manajer.index')

@section('content')
<div>
    <!-- Selamat Datang -->
    <div class="d-flex justify-content-between">
        <h4 class="p-3 m-3 text-center">Selamat Datang, {{auth()->user()->name}}</h4>
        <div class="time border rounded-4 p-3 m-3 text-center">
            <h6 id="tanggal"></h6>
            <h4 id="jam"></h4>
        </div>
    </div>
    <!-- Selamat Datang -->
    <!-- Card Info -->
    <div class="row mx-2 my-4">
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-success d-flex">
                        <i class="bi bi-people-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Karyawan</h5>
                        <h6 class="m-0">{{$totalKaryawan}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-primary d-flex">
                        <i class="bi bi-building-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Departemen</h5>
                        <h6 class="m-0">{{$totalDepartemen}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 my-sm-1 px-sm-1 col-xl-4 my-xl-0 px-xl-3">
            <div class="card">
                <div class="card-body d-flex justify-content-start">
                    <div class="icon bg-warning d-flex">
                        <i
                            class="bi bi-file-earmark-text-fill text-light m-auto fs-2"></i>
                    </div>
                    <div class="card-text align-content-center">
                        <h5 class="mb-1">Surat Cuti</h5>
                        <h6 class="m-0">{{$totalCuti}}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Info -->
    <!-- Data Absensi -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Data Absensi Karyawan</h5>
            <p>Tanggal : {{ today()->locale('id')->translatedFormat('d F Y') }}</p>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Jam Masuk</th>
                            <th>Status</th>
                            <th>Validasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensi as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->karyawan->nama_lengkap}}</td>
                            <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                            <td>{{$item->jam_masuk}}</td>
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
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Belum ada karyawan absen</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Absensi -->
    <!-- Data Cuti Karyawan -->
    <div class="row mx-2 my-4">
        <div class="col-md-12 my-sm-1 px-sm-1 col-xl-12 my-xl-0 px-xl-3">
            <h5>Data Karyawan Cuti</h5>
            <p>Bulan : {{ today()->locale('id')->translatedFormat('F') }}</p>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status Cuti</th>
                            <th>Disetujui / Ditolak Oleh</th>
                            <th>Butki Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cuti as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->karyawan->nama_lengkap}}</td>
                            <td>{{$item->karyawan->jabatan->nama_jabatan}}</td>
                            <td>
                                <span @class([ 'badge' , 'text-bg-warning'=> $item->status == 'Menunggu',
                                    'text-bg-danger' => $item->status == 'Ditolak',
                                    'text-bg-success' => $item->status == 'Disetujui',
                                    ])>{{$item->status}}</span>
                            </td>
                            <td>{{$item->disetujui_oleh}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm bi bi-eye-fill"
                                    href="{{route('manajer.cuti.show', $item->id)}}"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    data-bs-custom-class="custom-tooltip"
                                    data-bs-title="Lihat Surat"></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">Belum ada pengajuan cuti bulan ini</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Data Cuti Karyawan -->
</div>
@endsection