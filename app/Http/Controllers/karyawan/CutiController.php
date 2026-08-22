<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index()
    {
        $karyawan = auth()->user()->karyawan;
        $cuti = Cuti::where('id_karyawan', $karyawan->id)->latest()->get();
        return view('karyawan.pages.cuti', compact('cuti', 'karyawan'));
    }

    public function store(Request $request)
    {
        $karyawan = auth()->user()->karyawan;

        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        Cuti::create([
            'id_karyawan' => $karyawan->id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'menunggu'
        ]);

        return redirect()->route('karyawan.cuti')->with('success', 'Pengajuan cuti anda berhasil dikirim');
    }

    public function show(Cuti $cuti)
    {
        $karyawan = auth()->user()->karyawan;
        if ($cuti->id_karyawan !== $karyawan->id) {
            abort(403);
        }
        $cuti->load('karyawan.jabatan.departemen');
        return view('karyawan.pages.surat_cuti', compact('cuti'));
    }
}
