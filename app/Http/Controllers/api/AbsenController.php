<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Absensi;

class AbsenController extends Controller
{
    public function store(Request $request)
    {
        $karyawan = auth()->user()->karyawan ?? null;
        if (!$karyawan) {
            return response()->json([
                'success' => false,
                'message' => 'Data karyawan tidak ditemukan',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:Hadir,Izin,Sakit,Alfa',
            'keterangan' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $absensi = Absensi::where('id_karyawan', $karyawan->id)->whereDate('tanggal', today())->first();
        if ($absensi) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah melakukan absensi masuk!',
            ], 400);
        }

        $absensiBaru = Absensi::create([
            'id_karyawan' => $karyawan->id,
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Data absensi berhasil diambil',
            'data' => $absensiBaru,
        ], 200);
    }
}
