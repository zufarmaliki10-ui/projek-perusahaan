<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('karyawan.jabatan')->latest()->get();
        return view('hrd.pages.absensi.absensi', compact('absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::with('karyawan.jabatan')->find($id);
        return view('hrd.pages.absensi.update', compact('absensi'));
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

        return redirect()->route('HRD.absensi')->with('success', 'Absen karyawan berhasil divalidasi');
    }

    public function show($id)
    {
        $absensi = Absensi::with('karyawan.jabatan.departemen')->findOrFail($id);
        return view('hrd.pages.absensi.show', compact('absensi'));
    }
}
