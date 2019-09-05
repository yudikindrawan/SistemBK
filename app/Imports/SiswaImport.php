<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            //
        'nis' => $row[0],
        'id_kelas' => $row[1],
        'nama_siswa' => $row[2],
        'tempat_lahir' => $row[3],
        'tanggal_lahir' => $row[4],
        'jenis_kelamin' => $row[5],
        'alamat' => $row[6],
        'nama_ortu' => $row[7],
        'no_telp' => $row[8],
        'alamat_ortu' => $row[9],
        ]);
    }
}
