<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with('jabatan.departemen')->latest()->get();
        return view('hrd.pages.karyawan.karyawan', compact('karyawan'));
    }

    public function create()
    {
        $departemen = Departemen::all();
        return view('hrd.pages.karyawan.create', compact('departemen'));
    }

    public function getJabatan(Departemen $departemen)
    {
        $jabatan = $departemen->jabatan;
        return response()->json($jabatan);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jabatan' => 'required|exists:jabatan,id',
            'nip' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki, perempuan',
            'tanggal_masuk' => 'required|date',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:aktif, non-aktif'
        ]);

        Karyawan::create([
            'id_jabatan' => $request->id_jabatan,
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('HRD.karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit()
    {
        return view('hrd.pages.karyawan.update');
    }
}
