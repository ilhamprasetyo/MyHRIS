<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisiAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('revisi', function (Blueprint $table){
         $table->bigIncrements('id');
         $table->integer('absensi_id');
         $table->integer('pegawai_id');
         $table->time('request_clock_in');
         $table->time('request_clock_out');
         $table->date('request_date');
         $table->string('keterangan')->nullable();
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
      Schema::dropIfExists('revisi');
    }
}
