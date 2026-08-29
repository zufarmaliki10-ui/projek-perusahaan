@extends('karyawan.index')

@section('content')
<section class="main">
    <!-- Selamat Datang -->
    <div class="d-flex justify-content-between">
        <h3 class="p-3 m-3 text-center">Selamat Datang, <strong class="text-decoration-underline">{{$karyawan->nama_lengkap}}</strong></h3>
        <div class="time card p-3 m-3 text-center">
            <h4 class="tanggal"></h4>
            <h4 class="jam"></h4>
        </div>
    </div>
    <!-- Selamat Datang -->
    <!-- Profil -->
    <div class="d-flex flex-column flex-lg-row justify-content-center align-items-stretch">

        <!-- Foto -->
        <div
            class="profil overflow-hidden m-2 rounded-3"
            style="border: 1px solid black">

            <img
                class="img-fluid"
                src="{{ asset('visitor/img/profil.jpg') }}"
                alt="Profil Karyawan">

        </div>

        <!-- Data Diri -->
        <div
            class="identitas p-2 m-2 rounded-3"
            style="border: 1px solid black">

            <h5 class="text-center mb-4">Data Diri Karyawan</h5>

            <p>Nama Lengkap : {{ $karyawan->nama_lengkap }}</p>
            <p>Jenis Kelamin : {{ $karyawan->jenis_kelamin }}</p>
            <p>No. Telepon : {{ $karyawan->no_telp }}</p>
            <p>Alamat : {{ $karyawan->alamat }}</p>

        </div>

        <!-- Status -->
        <div
            class="identitas p-2 m-2 rounded-3"
            style="border: 1px solid black">

            <h5 class="text-center mb-4">Status Bekerja</h5>

            <p>NIP : {{ $karyawan->nip }}</p>
            <p>Jabatan : {{ $karyawan->jabatan->nama_jabatan }}</p>

            <p>
                Status :
                <span class="badge {{ $karyawan->status == 'Aktif' ? 'text-bg-success' : 'text-bg-danger' }}">
                    {{ $karyawan->status }}
                </span>
            </p>

            <p>Tanggal Masuk : {{ $karyawan->tanggal_masuk }}</p>

        </div>

        <!-- Chart -->
        <div
            class="chart-container p-2 m-2 rounded-3"
            style="border: 1px solid black">

            <canvas id="myChart"></canvas>

        </div>

    </div>
    <!-- Profil -->
    <!-- Data Absen -->
    <div class="table-responsive mx-4 my-2">
        <h5>Tabel Absensi</h5>
        <table class="table table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Status</th>
                    <th>Status Validasi</th>
                    <th>Validator</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($totalAbsen as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tanggal->locale('id')->translatedFormat('D, d M Y')}}</td>
                    <td>{{$item->jam_masuk}}</td>
                    <td>{{$item->jam_pulang}}</td>
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
                </tr>
                @empty
                <tr>
                    <td colspan="6">Belum ada pengajuan cuti</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Data Absen -->
    <!-- Data Cuti -->
    <div class="table-responsive mx-4 my-2">
        <h5>Tabel Pengajuan Cuti</h5>
        <table class="table table-striped table-hover">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Alasan</th>
                    <th>Mulai Cuti</th>
                    <th>Akhir Cuti</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($cuti as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->alasan}}</td>
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
                        <button class="btn btn-secondary btn-sm" disabled>Menunggu Persetujuan</button>
                        @else
                        <a class="btn btn-primary btn-sm" href="{{route('karyawan.cuti.show', $item->id)}}">Lihat Surat Cuti</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Belum ada pengajuan cuti</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Data Cuti -->
</section>
<script>
    window.absensiData = @json($absensi);
</script>
@endsection