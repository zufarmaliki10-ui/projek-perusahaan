<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawan = auth()->user()->karyawan;

        // Validasi akun jika tidak terhubung ke data karyawan
        if (!$karyawan) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data karyawan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diambil',

            'data' => [
                'id_user' => $karyawan->id_user,
                'id_jabatan' => $karyawan->id_jabatan,
                'nip' => $karyawan->nip,
                'nama_lengkap' => $karyawan->nama_lengkap,
                'jenis_kelamin' => $karyawan->jenis_kelamin,
                'bank' => $karyawan->bank,
                'nomer_rekening' => $karyawan->nomer_rekening,
                'tanggal_masuk' => $karyawan->tanggal_masuk,
                'no_telp' => $karyawan->no_telp,
                'alamat' => $karyawan->alamat,
                'status' => $karyawan->status,

                'cuti' => $karyawan->cuti->map(function ($cutiItem) {
                    return [
                        'id' => $cutiItem->id,
                        'id_karyawan' => $cutiItem->id_karyawan,
                        'tanggal_mulai' => $cutiItem->tanggal_mulai
                            ->locale('id')
                            ->translatedFormat('d F Y'),
                        'tanggal_selesai' => $cutiItem->tanggal_selesai
                            ->locale('id')
                            ->translatedFormat('d F Y'),
                        'alasan' => $cutiItem->alasan,
                        'status' => $cutiItem->status,
                        'disetujui_oleh' => $cutiItem->disetujui_oleh,
                    ];
                }),
            ]
        ], 200);
    }
}