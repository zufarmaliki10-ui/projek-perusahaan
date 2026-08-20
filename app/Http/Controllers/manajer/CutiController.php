<?php

namespace App\Http\Controllers\manajer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return view('manajer.pages.cuti');
    }

    public function show()
    {
        return view('manajer.pages.validasi');
    }
}
