@extends('manajer.index')

@section('content')
<div>
    <a class="btn btn-primary btn-sm m-2" href="{{route('manajer.absensi')}}">Kembali</a>
    <!-- Data Karyawan -->
    <div class="row mx-2 my-4">
        <h5>Rekap Absensi Karyawan</h5>
        <!-- Form Filter -->
        <div class="d-flex justify-content-start mb-3">
            <form class="d-flex justify-content-start" action="{{route('manajer.absensi.rekap')}}" method="get">
                <select class="form-select w-25 mx-1" name="tahun" id="">
                    <option value="">-- Pilih Tahun --</option>
                    @for ($i = now()->year; $i >= 2020; $i--)
                    <option value="{{$i}}" {{request('tahun') == $i ? 'selected' : ''}}>
                        {{$i}}
                    </option>
                    @endfor
                </select>
                <select class="form-select w-25 mx-1" name="bulan" id="">
                    <option value="">-- Pilih Bulan --</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{$i}}" {{request('bulan') == $i ? 'selected' : ''}}>
                        {{\Carbon\Carbon::create()->month($i)->locale('id-ID')->translatedFormat('F')}}
                        </option>
                        @endfor
                </select>
                <button class="btn btn-primary mx-1" type="submit">Masuk ke Halaman Rekap</button>
            </form>
        </div>
        <!-- Form Filter -->
        <!-- Data Absensi Rekap -->
        @if(request('tahun') && request('bulan'))
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Departemen</th>
                        <th>Hadir</th>
                        <th>Izin</th>
                        <th>Sakit</th>
                        <th>Alfa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $idKaryawan => $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->first()->karyawan->nama_lengkap}}</td>
                        <td>{{$data->first()->karyawan->jabatan->nama_jabatan}}</td>
                        <td>{{$data->first()->karyawan->jabatan->departemen->nama_departemen}}</td>
                        <td>{{$data->where('status', 'hadir')->count()}}</td>
                        <td>{{$data->where('status', 'izin')->count()}}</td>
                        <td>{{$data->where('status', 'sakit')->count()}}</td>
                        <td>{{$data->where('status', 'alfa')->count()}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">Belum ada data absensi karyawan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
        <!-- Data Absensi Rekap -->
    </div>
    <!-- Data Karyawan -->
</div>
@endsection