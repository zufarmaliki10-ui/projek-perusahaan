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
        $gaji = Gaji::with([
            'karyawan.jabatan.departemen'
        ])->get();

        //validasi akun jika tidak terhubung ke data gaji
        if (!$gaji) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gaji tidak ditemukan'
            ], 404);
        }

        //Fetch & Mapping data gaji untuk tabel
        $dataGaji = $gaji->map(function ($gajiItem) {
            return [
                'id_karyawan' => $gajiItem->id_karyawan,
                'bulan' => $gajiItem->bulan,
                'tahun' => $gajiItem->tahun,
                'gaji_pokok' => $gajiItem->gaji_pokok,
                'tunjangan' => $gajiItem->tunjangan,
                'lembur' => $gajiItem->lembur,
                'total_gaji' => $gajiItem->total_gaji,
                'tanggal_bayar' => $gajiItem->tanggal_bayar->locale('id')->translatedFormat('d F Y'),
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
