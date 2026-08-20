<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Departemen $departemen)
    {
        $jabatan = $departemen->jabatan;

        return view('hrd.pages.jabatan.jabatan', compact('departemen', 'jabatan'));
    }

    public function create(Departemen $departemen)
    {
        return view('hrd.pages.jabatan.create');
    }
}
