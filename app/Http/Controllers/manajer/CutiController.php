<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->latest()->get();
        return view('manajer.pages.cuti.cuti', compact('cuti'));
    }

    public function edit($id)
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->find($id);
        return view('manajer.pages.cuti.validasi', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Disetujui,Ditolak',
            'disetujui_oleh' => 'required|string',
        ]);

        $cuti->update([
            'status' => $request->status,
            'disetujui_oleh' => auth()->user()->name,
        ]);

        return redirect()->route('manajer.cuti')->with('success', 'Pengajuan telah dikonfirmasi');
    }

    public function show($id)
    {
        $cuti = Cuti::with('karyawan.jabatan.departemen')->find($id);
        return view('manajer.pages.cuti.show', compact('cuti'));
    }
}
