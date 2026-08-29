<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
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
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'bank' => 'required|string|max:100',
            'nomer_rekening' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:Aktif,Non-Aktif'
        ]);

        Karyawan::create([
            'id_jabatan' => $request->id_jabatan,
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'bank' => $request->bank,
            'nomer_rekening' => $request->nomer_rekening,
            'tanggal_masuk' => $request->tanggal_masuk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('HRD.karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $karyawan = Karyawan::with('jabatan.departemen')->find($id);
        $departemen = Departemen::all();
        return view('hrd.pages.karyawan.update', compact('karyawan', 'departemen'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'id_jabatan' => 'required|exists:jabatan,id',
            'nip' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tanggal_masuk' => 'required|date',
            'no_telp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'status' => 'required|in:Aktif,Non-Aktif'
        ]);

        $karyawan->update([
            'id_jabatan' => $request->id_jabatan,
            'nip' => $request->nip,
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        return redirect()->route('HRD.karyawan')->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('HRD.karyawan')->with('success', 'Data karyawan berhasil dihapus');
    }

    public function show($id)
    {
        $karyawan = Karyawan::with('jabatan.departemen')->find($id);
        $departemen = Departemen::all();
        return view('hrd.pages.karyawan.show', compact('karyawan', 'departemen'));
    }

    public function make($id)
    {
        $karyawan = Karyawan::find($id);
        return view('hrd.pages.karyawan.make', compact('karyawan'));
    }

    public function account(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $karyawan->nama_lengkap,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'karyawan',
        ]);

        $karyawan->update([
            'id_user' => $user->id,
        ]);

        return redirect()->route('HRD.karyawan')->with('success', 'Akun karyawan berhasil dibuat');
    }
}
