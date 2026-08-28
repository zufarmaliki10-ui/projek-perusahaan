<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsenController extends Controller
{
    public function index()
    {
        return view('karyawan.pages.absensi');
    }

    public function store(Request $request)
    {
        $karyawan = auth()->user()->karyawan;

        $request->validate([
            'status' => 'required|in:hadir,izin,sakit,alfa',
            'keterangan' => 'nullable|string'
        ]);

        $absensi = Absensi::where('id_karyawan', $karyawan->id)->whereDate('tanggal', today())->first();

        if ($absensi) {
            return back()->withErrors('error', 'Anda sudah melakukan absensi masuk!');
        }

        Absensi::create([
            'id_karyawan' => $karyawan->id,
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('karyawan.absensi')->with('success', 'Anda telah berhasil absen masuk');
    }

    public function update(Request $request)
    {
        $karyawan = auth()->user()->karyawan;

        $request->validate([
            'keterangan' => 'required|string',
        ]);

        $absensi = Absensi::where('id_karyawan', $karyawan->id)->whereDate('tanggal', today())->first();

        if (!$absensi) {
            return back()->with('error', 'Anda belum melakukan absen masuk');
        }

        if ($absensi->jam_keluar) {
            return back()->with('error', 'Anda sudah absen pulang');
        }

        if ($absensi->id_karyawan !== $karyawan->id) {
            abort(403, 'Silahkan masukkan absen milik anda sendiri!');
        }

        $absensi->update([
            'jam_keluar' => now()->toTimeString(),
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('karyawan.absensi')->with('success', 'Anda telah berhasil absen pulang');
    }
}
