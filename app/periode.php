<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class periode extends Model
{
    //
    protected $table = 'periode';
    protected $fillable = ['semester','tahun_akademik'];

    public function konseling(){
      return $this->hasMany('App\konseling','id_periode');
    }
}
