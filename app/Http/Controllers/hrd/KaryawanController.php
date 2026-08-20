<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('hrd.pages.karyawan.karyawan');
    }

    public function create()
    {
        return view('hrd.pages.karyawan.create');
    }

    public function edit()
    {
        return view('hrd.pages.karyawan.update');
    }
}
