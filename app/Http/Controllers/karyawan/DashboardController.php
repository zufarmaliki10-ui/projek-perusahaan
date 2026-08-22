<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = auth()->user()->karyawan;
        $cuti = Cuti::where('id_karyawan', $karyawan->id)->latest()->get();
        return view('karyawan.pages.dashboard', compact('karyawan', 'cuti'));
    }
}
