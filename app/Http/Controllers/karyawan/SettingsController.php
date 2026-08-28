<?php

namespace App\Http\Controllers\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        return view('karyawan.pages.settings');
    }

    public function update(Request $request){
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|different:password_lama',
            'password_baru_confirmation' => 'required|same:password_baru',
        ],[
            'password_lama.required' => 'Password lama wajib diisi!',
            'password_baru.required' => 'Password baru wajib diisi!',
            'password_baru.min' => 'Password baru minimal 8 karakter.',
            'password_baru.different' => 'Password baru harus berbeda dengan password lama',
            'password_baru_confirmation.required' => 'Konfirmasi password wajib diisi',
            'password_baru_confirmation.same' => 'Konfirmasi password tidak sama.',
        ]);

        $karyawan = Auth::user();

        if(!Hash::check($request->password_lama, $karyawan->password)){
            return back()->withErrors([
                'password_lama' => 'Password lama tidak sesuai.'
            ])->withInput();
        }

        $karyawan->password = Hash::make($request->password_baru);
        $karyawan->save();

        return redirect()->route('karyawan.settings')->with('success', 'Password anda berhasil diubah');
    }
}
