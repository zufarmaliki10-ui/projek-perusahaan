<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Jabatan;
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
        return view('hrd.pages.jabatan.create', compact('departemen'));
    }

    public function store(Request $request, Departemen $departemen)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        Jabatan::create([
            'id_departemen' => $departemen->id,
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
        ]);

        return redirect()->route('HRD.jabatan', ['departemen' => $departemen->id])->with('success', 'Data jabatan berhasil ditambahkan');
    }

    public function edit(Departemen $departemen, Jabatan $jabatan)
    {
        return view('hrd.pages.jabatan.update', compact('departemen', 'jabatan'));
    }

    public function update(Request $request, Departemen $departemen, Jabatan $jabatan)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:100',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
        ]);

        $jabatan->update([
            'id_departemen' => $departemen->id,
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
        ]);

        return redirect()->route('HRD.jabatan', ['departemen' => $departemen->id])->with('success', 'Data jabatan berhasil diperbarui');
    }

    public function destroy(Departemen $departemen, Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->route('HRD.jabatan', ['departemen' => $departemen->id])->with('success', 'Data jabatan berhasil dihapus');
    }
}
