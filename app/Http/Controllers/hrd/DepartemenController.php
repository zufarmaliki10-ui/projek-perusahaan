<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::latest()->get();
        return view('hrd.pages.departemen.departemen', compact('departemen'));
    }

    public function create()
    {
        return view('hrd.pages.departemen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        Departemen::create([
            'nama_departemen' => $request->nama_departemen,
            'status' => $request->status,
        ]);

        return redirect()->route('HRD.departemen')->with('success', 'Departemen baru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $departemen = Departemen::find($id);
        return view('hrd.pages.departemen.update', compact('departemen'));
    }

    public function update(Request $request, Departemen $departemen)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
            'status' => 'required|in:aktif,non-aktif',
        ]);

        $departemen->update([
            'nama_departemen' => $request->nama_departemen,
            'status' => $request->status,
        ]);

        return redirect()->route('HRD.departemen')->with('success', 'Departemen baru berhasil ditambahkan');
    }
}
