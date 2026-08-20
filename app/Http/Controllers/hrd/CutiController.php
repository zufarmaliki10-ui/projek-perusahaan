<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        return view('hrd.pages.cuti');
    }

    public function show(){
        return view('hrd.pages.validasi');
    }
}
