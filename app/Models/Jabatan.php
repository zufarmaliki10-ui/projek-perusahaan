<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';

    protected $fillable = [
        'id_departemen',
        'nama_jabatan',
        'gaji_pokok',
        'tunjangan',
    ];

    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen');
    }

    public function karyawan(){
        return $this->hasMany(Karyawan::class, 'id_jabatan');
    }
}
