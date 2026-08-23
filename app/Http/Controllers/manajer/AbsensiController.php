<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

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
        return view('manajer.pages.absen.update', compact('absensi'));
    }

    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'status_validasi' => 'required|in:menunggu,disetujui,ditolak',
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
}
