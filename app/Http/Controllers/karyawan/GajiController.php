<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use Barryvdh\DomPDF\Facade\Pdf;

class GajiController extends Controller
{
    public function index()
    {
        $karyawan = auth()->user()->karyawan;
        $gaji = Gaji::where('id_karyawan', $karyawan->id)->latest()->get();
        return view('karyawan.pages.gaji', compact('gaji', 'karyawan'));
    }

    public function show(Gaji $gaji)
    {
        $karyawan = auth()->user()->karyawan;
        if ($gaji->id_karyawan !== $karyawan->id) {
            abort(403);
        }
        $gaji->load('karyawan.jabatan.departemen');
        return view('karyawan.pages.slip_gaji', compact('karyawan', 'gaji'));
    }

    public function download(Gaji $gaji)
    {
        $karyawan = auth()->user()->karyawan;
        if ($gaji->id_karyawan !== $karyawan->id) {
            abort(403);
        }
        $gaji->load('karyawan.jabatan.departemen');
        $pdf = Pdf::loadView('karyawan.pages.slip_pdf', compact('gaji'));
        return $pdf->download('slip-gaji-' . $gaji->bulan . '-' . $gaji->tahun . '.pdf');
    }
}
