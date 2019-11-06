<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    //
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas','nama_jurusan'];

    public function siswa(){
      return $this->hasMany(siswa::class);
    }

    public function guru(){
      return $this->hasMany(guru::class);
    }
}
