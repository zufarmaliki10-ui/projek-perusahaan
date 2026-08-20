<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        return view('hrd.pages.departemen');
    }
}
