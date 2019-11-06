<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class konseling extends Model
{
    //
    protected $table = 'konselings';
    protected $fillable = ['id_periode', 'id_pelanggaran', 'id_siswa', 'bimbingan_konseling','nama_siswa','total_poin', 'tahun_akademik','tanggal_pemanggilan'];

    public function periode(){
      return $this->belongsTo('App\periode','id_periode');
    }
    public function pelanggaran(){
      return $this->belongsTo('App\pelanggaran','id_pelanggaran');
    }
    public function siswa(){
      return $this->belongsTo('App\siswa', 'id_siswa');
    }
    public function user(){
      return $this->belongsTo('App\User');
    }
}
