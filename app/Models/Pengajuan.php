<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = "pengajuan";

    protected $fillable = ['pegawai_id', 'jenis_cuti', 'tanggal_pengajuan', 'mulai', 'hingga', 'lama_cuti', 'unit_id', 'jabatan_id', 'file', 'status', 'keterangan'];

}
