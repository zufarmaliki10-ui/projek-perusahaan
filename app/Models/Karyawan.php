<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';

    protected $fillable = [
        'id_user',
        'id_jabatan',
        'nip',
        'nama_lengkap',
        'jenis_kelamin',
        'bank',
        'nomer_rekening',
        'tanggal_masuk',
        'no_telp',
        'alamat',
        'status',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'id_karyawan');
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_karyawan');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'id_karyawan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
