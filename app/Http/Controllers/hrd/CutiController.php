<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->latest()->get();
        return view('hrd.pages.cuti.cuti', compact('cuti'));
    }

    public function edit($id)
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->find($id);
        return view('hrd.pages.cuti.validasi', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Disetujui,Ditolak',
            'ttd' => 'required|string',
            'disetujui_oleh' => 'required|string',
        ]);

        $cuti->update([
            'status' => $request->status,
            'ttd' => $request->ttd,
            'disetujui_oleh' => auth()->user()->name,
        ]);

        return redirect()->route('HRD.cuti')->with('success', 'Pengajuan telah dikonfirmasi');
    }

    public function show($id)
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->find($id);
        return view('hrd.pages.cuti.show', compact('cuti'));
    }
}
