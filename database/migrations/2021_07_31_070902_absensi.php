<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Absensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('absensi', function (Blueprint $table){
        $table->bigIncrements('id');
        $table->integer('pegawai_id');
        $table->time('clock_in');
        $table->time('clock_out')->nullable();
        $table->date('date');
        $table->integer('kehadiran');
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
      Schema::dropIfExists('absensi');
    }
}
