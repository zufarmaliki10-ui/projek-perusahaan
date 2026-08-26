<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Karyawan;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::first();

        // Validasi akun jika tidak terhubung ke data karyawan
        if (!$karyawan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        // Fetch & Mapping data cuti untuk tabel
        $cuti = Cuti::where('id_karyawan', $karyawan->id)
            ->latest()
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'id_karyawan' => $item->id_karyawan,
                    'tanggal_mulai' => $item->tanggal_mulai ? $item->tanggal_mulai->locale('id')->translatedFormat('d F Y') : null,
                    'tanggal_selesai' => $item->tanggal_selesai ? $item->tanggal_selesai->locale('id')->translatedFormat('d F Y') : null,
                    'alasan' => $item->alasan,
                    'status' => $item->status,
                    'disetujui_oleh' => $item->disetujui_oleh,
                    'created_at' => $item->created_at
                ];
            });

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',
            'data' => [
                'karyawan' => $karyawan,
                'cuti' => $cuti,
            ]
        ], 200);
    }
}
