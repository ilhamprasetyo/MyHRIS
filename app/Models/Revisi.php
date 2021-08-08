<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revisi extends Model
{
    protected $table = "revisi";

    protected $fillable = ['absensi_id', 'pegawai_id', 'clock_in', 'clock_out', 'date', 'keterangan'];
}
