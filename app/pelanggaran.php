<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggaran extends Model
{
    //
    protected $table = 'pelanggaran';
    protected $fillable = ['nama_pelanggaran','poin_pelanggaran'];

    public function konseling(){
      return $this->hasMany(konseling::class);
    }
}
