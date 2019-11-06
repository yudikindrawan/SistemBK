<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonselingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konselings', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedinteger('id_periode');
            $table->foreign('id_periode')->references('id')->on('periode')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedinteger('id_pelanggaran');
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggaran')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedinteger('id_siswa');
            $table->foreign('id_siswa')->references('nis')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['Valid','Pending'])->default('Pending');
            $table->string('bimbingan_konseling')->nullable();
            $table->string('nama_siswa')->nullable();
            $table->enum('status_surat', ['0','1'])->default('0');
            $table->integer('total_poin')->nullable();
            $table->string('tanggal_pemanggilan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konselings');
    }
}
