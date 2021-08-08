<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";

    protected $fillable = ['nama','alamat','unit_id','jabatan_id','cuti', 'file'];
}
