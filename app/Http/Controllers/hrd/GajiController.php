<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        return view('hrd.pages.gaji');
    }

    public function input()
    {
        return view('hrd.pages.input_gaji');
    }

    public function create()
    {
        return view('hrd.pages.slip_gaji');
    }

    public function show()
    {
        return view('hrd.pages.slip_review');
    }
}
