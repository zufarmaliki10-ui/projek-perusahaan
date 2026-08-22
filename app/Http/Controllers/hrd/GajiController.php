<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Departemen;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::with('karyawan.jabatan.departemen')->get();
        return view('hrd.pages.gaji.gaji', compact('gaji'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('hrd.pages.gaji.create', compact('departemen'));
    }

    public function getKaryawan($departemen)
    {
        $karyawan = Karyawan::whereHas('jabatan', function ($query) use ($departemen) {
            $query->where('id_departemen', $departemen);
        })->get();

        return response()->json($karyawan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required|exists:karyawan,id',
            'bulan' => 'required|string',
            'tahun' => 'required|integer',
        ]);

        $karyawan = Karyawan::with('jabatan')->findOrFail($request->id_karyawan);

        $gaji = Gaji::create([
            'id_karyawan' => $karyawan->id,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'gaji_pokok' => $karyawan->jabatan->gaji_pokok,
            'tunjangan' => $karyawan->jabatan->tunjangan,
        ]);

        return redirect()->route('HRD.gaji.edit', $gaji->id)->with('success', 'Silahkan lanjutkan mengisi gaji karyawan');
    }

    public function edit($id)
    {
        $gaji = Gaji::with('karyawan.jabatan.departemen')->findOrFail($id);
        return view('hrd.pages.gaji.update', compact('gaji'));
    }

    public function update(Request $request, Gaji $gaji)
    {
        $request->validate([
            'lembur' => 'required|numeric|min:0',
            'tanggal_bayar' => 'required|date',
        ]);

        $totalGaji = $gaji->gaji_pokok + $gaji->tunjangan + $request->lembur;

        $gaji->update([
            'lembur' => $request->lembur,
            'total_gaji' => $totalGaji,
            'tanggal_bayar' => $request->tanggal_bayar,
            'nama_hrd' => auth()->user()->name,
        ]);

        return redirect()->route('HRD.gaji.show', $gaji->id)->with('success', 'gaji karyawan berhasil diinput');
    }

    public function show($id)
    {
        $gaji = Gaji::with('karyawan.jabatan.departemen')->findOrFail($id);
        return view('hrd.pages.gaji.show', compact('gaji'));
    }
}
