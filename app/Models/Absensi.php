<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
  protected $table = "absensi";

  protected $fillable = ["pegawai_id", "clock_in", "clock_out", "date", "kehadiran"];
}
