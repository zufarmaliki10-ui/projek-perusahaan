<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Karyawan;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::with(['cuti' => function ($query) {
            $query->latest();
        }])->get();

        // Validasi akun jika tidak terhubung ke data karyawan
        if (!$karyawan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        // Fetch & Mapping data cuti untuk tabel
        $dashboard = $karyawan->map(function ($karyawanItem) {
            return [
                'id_user' => $karyawanItem->id_user,
                'id_jabatan' => $karyawanItem->id_jabatan,
                'nip' => $karyawanItem->nip,
                'nama_lengkap' => $karyawanItem->nama_lengkap,
                'jenis_kelamin' => $karyawanItem->jenis_kelamin,
                'bank' => $karyawanItem->bank,
                'nomer_rekening' => $karyawanItem->nomer_rekening,
                'tanggal_masuk' => $karyawanItem->tanggal_masuk,
                'no_telp' => $karyawanItem->no_telp,
                'alamat' => $karyawanItem->alamat,
                'status' => $karyawanItem->status,
                'cuti' => $karyawanItem->cuti->map(function ($cutiItem) {
                    return [
                        'id' => $cutiItem->id,
                        'id_karyawan' => $cutiItem->id_karyawan,
                        'tanggal_mulai' => $cutiItem->tanggal_mulai->locale('id')->translatedFormat('d F Y'),
                        'tanggal_selesai' => $cutiItem->tanggal_selesai->locale('id')->translatedFormat('d F Y'),
                        'alasan' => $cutiItem->alasan,
                        'status' => $cutiItem->status,
                        'disetujui_oleh' => $cutiItem->disetujui_oleh,
                    ];
                }),
            ];
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => $dashboard
        ], 200);
    }
}
