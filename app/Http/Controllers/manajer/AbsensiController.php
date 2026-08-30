<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('karyawan.jabatan')->latest()->get();
        return view('manajer.pages.absen.absensi', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::with('karyawan.jabatan')->find($id);
        if ($absensi->validator !== null) {
            return redirect()->route('manajer.absensi')->with('error', 'Absensi sudah divalidasi');
        }
        return view('manajer.pages.absen.update', compact('absensi'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'status_validasi' => 'required|in:Menunggu,Disetujui,Ditolak',
        ]);

        if (!$absensi->jam_keluar || !$absensi->keterangan) {
            return back()->with('error', 'karyawan belum mengisi form absensi');
        }

        $absensi->update([
            'status_validasi' => $request->status_validasi,
            'validator' => auth()->user()->name,
        ]);

        return redirect()->route('manajer.absensi')->with('success', 'Absensi berhasil divalidasi');
    }

    public function rekap(Request $request)
    {
        $absensi = collect();
        if ($request->filled(['tahun', 'bulan'])) {
            $absensi = Absensi::with('karyawan.jabatan.departemen')->whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)->get()->groupBy('id_karyawan');
        }
        return view('manajer.pages.absen.rekap', compact('absensi'));
    }

    public function export(Request $request): StreamedResponse|RedirectResponse
    {
        if (!$request->filled(['tahun', 'bulan'])) {
            return back()->with('error', 'Silahkan pilih bulan dan tahun terlebih dahulu!');
        }

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $rekapGrouped = Absensi::with('karyawan.jabatan.departemen')->whereMonth('tanggal', $request->bulan)->whereYear('tanggal', $request->tahun)->get()->groupBy('id_karyawan');

        $fileName = "rekap-absensi-{$bulan}-{$tahun}.csv";

        $headers = [
            "Content-Type"        => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=\"$fileName\"",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $callback = function () use ($rekapGrouped) {
            $handle = fopen('php://output', 'w');

            fputs($handle, "\xEF\xBB\xBF");
            fputcsv($handle, [
                'No',
                'Nama Karyawan',
                'Departemen',
                'Jabatan',
                'Hadir',
                'Izin',
                'Sakit',
                'Total Kehadiran'
            ]);

            $no = 1;
            foreach ($rekapGrouped as $idKaryawan => $listAbsen) {
                $karyawan = $listAbsen->first()->karyawan;

                $jumlahHadir = $listAbsen->where('status', 'Hadir')->count();
                $jumlahIzin  = $listAbsen->where('status', 'Izin')->count();
                $jumlahSakit = $listAbsen->where('status', 'Sakit')->count();
                $totalHadir  = $listAbsen->count();

                fputcsv($handle, [
                    $no++,
                    $karyawan->nama_lengkap ?? '-',
                    $karyawan->jabatan->departemen->nama_departemen ?? '-',
                    $karyawan->jabatan->nama_jabatan ?? '-',
                    $jumlahHadir,
                    $jumlahIzin,
                    $jumlahSakit,
                    $totalHadir
                ]);
            }
            fclose($handle);
        };
        return response()->stream($callback, 200, $headers);
    }
}
