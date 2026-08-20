<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('hrd.pages.dashboard');
    }
}
