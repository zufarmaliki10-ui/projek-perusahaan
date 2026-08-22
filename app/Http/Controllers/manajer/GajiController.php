<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $gaji = Gaji::selectRaw('bulan,tahun,COUNT(*) as jumlah_karyawan, SUM(total_gaji) as total_gaji')->whereNotNull('tanggal_bayar')->groupBy('bulan', 'tahun')->orderByDesc('tahun')->get();
        return view('manajer.pages.gaji.gaji', compact('gaji'));
    }

    public function show($bulan, $tahun)
    {
        $gaji = Gaji::with('karyawan.jabatan.departemen')->where('bulan', $bulan)->where('tahun', $tahun)->whereNotNull('tanggal_bayar')->get();
        $totalAll = $gaji->sum('total_gaji');
        $totalKaryawan = $gaji->count();
        return view('manajer.pages.gaji.laporan', compact('gaji', 'bulan', 'tahun', 'totalAll', 'totalKaryawan'));
    }
}
