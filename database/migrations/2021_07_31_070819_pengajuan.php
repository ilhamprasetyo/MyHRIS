<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pengajuan', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('pegawai_id');
          $table->string('jenis_cuti');
          $table->date('tanggal_pengajuan');
          $table->integer('lama_cuti');
          $table->date('mulai');
          $table->date('hingga');
          $table->integer('unit_id');
          $table->integer('jabatan_id');          
          $table->string('file');
          $table->string('status');
          $table->string('keterangan');
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
        Schema::dropIfExists('pengajuan');
    }
}
