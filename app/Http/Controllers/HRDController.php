<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Pegawai2;
use App\Models\Pengajuan2;
use App\Models\Absensi;
use App\Models\Revisi;

class HRDController extends Controller
{
    public function hrd() {
      return view('/hrd/hrd');
    }

    public function approval_cuti() {
      return view('/hrd/approval_cuti');
    }

    public function approval_revisi() {
      return view('/hrd/approval_revisi');
    }

    public function pegawai() {
      $pegawai = Pegawai::all();
      return $pegawai;
    }

    public function pengajuan() {
      $pengajuan = Pengajuan2::all();
      return $pengajuan;
    }

    public function absensi() {
      $absensi = Absensi::all();
      return $absensi;
    }

    public function revisi() {
      $revisi = Revisi::all();
      return $revisi;
    }
}
