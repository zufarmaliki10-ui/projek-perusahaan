<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h3,
        h5 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h3>Slip Gaji Karyawan</h3>
        <h5>PT. MyOffice Indonesia</h5>
        <hr />
        <p>Nama Karyawan : {{$gaji->karyawan->nama_lengkap}}</p>
        <p>NIP : {{$gaji->karyawan->nip}}</p>
        <p>Departemen : {{$gaji->karyawan->jabatan->departemen->nama_departemen}}</p>
        <p>Jabatan : {{$gaji->karyawan->jabatan->nama_jabatan}}</p>
        <p>Periode Gaji : {{$gaji->bulan}} {{$gaji->tahun}}</p>
        <p>Bank Karyawan :</p>
        <p>Rekening Karyawan :</p>
        <hr />
        <p>Gaji Pokok : Rp {{number_format($gaji->gaji_pokok, 0, ',', '.')}}</p>
        <p>Tunjangan : Rp {{number_format($gaji->tunjangan, 0, ',', '.')}}</p>
        <p>Uang Lembur : Rp {{number_format($gaji->lembur, 0, ',', '.')}}</p>
        <hr />
        <p>Total Gaji : Rp {{number_format($gaji->total_gaji, 0, ',', '.')}}</p>
        <p>Yogyakarta, {{$gaji->tanggal_bayar->locale('id')->translatedFormat('d F Y')}}</p>
        <h6>Mengetahui,</h6>
        <h6>Kepala HRD Perusahaan</h6>
        <br>
        <br>
        <h6>(.................................)</h6>
    </div>
</body>

</html>