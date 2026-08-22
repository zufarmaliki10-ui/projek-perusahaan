<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Departemen;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalKaryawan = Karyawan::count();
        $totalDepartemen = Departemen::count();
        $totalCuti = Cuti::count();
        $absensi = Absensi::with('karyawan.jabatan')->whereDate('tanggal', today())->get();
        $cuti = Cuti::with('karyawan.jabatan')->whereMonth('tanggal_mulai', today()->month)->whereYear('tanggal_mulai', today()->year)->get();
        return view('manajer.pages.dashboard', compact('user', 'totalCuti', 'totalDepartemen', 'totalKaryawan', 'absensi', 'cuti'));
    }
}
