<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = auth()->user()->karyawan;
        return view('karyawan.pages.dashboard', compact('karyawan'));
    }
}
