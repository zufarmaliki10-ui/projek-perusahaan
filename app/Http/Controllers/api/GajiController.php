<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;
use Barryvdh\DomPDF\Facade\Pdf;

class GajiController extends Controller
{
    public function index()
    {
        // 1. Ambil data karyawan dari user yang login
        $user = auth()->user();
        $karyawan = $user ? $user->karyawan : null;

        // Validasi jika akun user belum terhubung dengan data karyawan
        if (!$karyawan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data karyawan tidak ditemukan untuk akun ini'
            ], 404);
        }

        // 2. Query data gaji HANYA milik karyawan yang login
        $gaji = Gaji::where('id_karyawan', $karyawan->id)
            ->latest()
            ->get();

        // 3. Jika belum ada data gaji, kembalikan status 200 dengan data array kosong []
        // Ini memastikan Flutter membaca response dengan sukses dan BottomNav TETAP MUNCUL
        if ($gaji->isEmpty()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Belum ada data gaji untuk akun ini',
                'data' => []
            ], 200);
        }

        // 4. Fetch & Mapping data gaji
        $dataGaji = $gaji->map(function ($gajiItem) {
            return [
                'id_karyawan' => $gajiItem->id_karyawan,
                'bulan' => $gajiItem->bulan,
                'tahun' => $gajiItem->tahun,
                'gaji_pokok' => $gajiItem->gaji_pokok,
                'tunjangan' => $gajiItem->tunjangan,
                'lembur' => $gajiItem->lembur,
                'total_gaji' => $gajiItem->total_gaji,
                // Pengecekan null-safety pada tanggal_bayar agar tidak crash jika bernilai NULL
                'tanggal_bayar' => $gajiItem->tanggal_bayar
                    ? $gajiItem->tanggal_bayar->locale('id')->translatedFormat('d F Y')
                    : null,
                'nama_hrd' => $gajiItem->nama_hrd,
            ];
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dimuat',
            'data' => $dataGaji
        ], 200);
    }
}
