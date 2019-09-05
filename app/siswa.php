<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    //
    protected $table = 'siswa';
    protected $primaryKey = 'nis';
    
    protected $fillable = [
      'nis',
      'id_kelas',
      'nama_siswa',
      'tempat_lahir',
      'tanggal_lahir',
      'jenis_kelamin',
      'alamat',
      'nama_ortu',
      'no_telp',
      'alamat_ortu',
    ];

    public function kelas(){
      return $this->belongsTo(kelas::class,'id_kelas');
    }

    public function konseling(){
      return $this->hasMany(konseling::class, 'id_siswa');
    }
}
