<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konseling extends Model
{
    //
    protected $table = 'konselings';
    protected $fillable = ['id_periode', 'id_pelanggaran', 'id_siswa', 'bimbingan_konseling','nama_siswa','total_poin', 'tahun_akademik'];
    
    public function periode(){
      return $this->belongsTo(periode::class,'id_periode');
    }
    public function pelanggaran(){
      return $this->belongsTo(pelanggaran::class,'id_pelanggaran');
    }
    public function siswa(){
      return $this->belongsTo(siswa::class, 'id_siswa');
    }
}
