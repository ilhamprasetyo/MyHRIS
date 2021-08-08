<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;
use App\Models\Pegawai2;
use App\Models\Pengajuan;
use App\Models\Pengajuan2;

class KoordinatorController extends Controller
{

  public function approval() {
    $id = auth()->user()->pegawai_id;
    $pegawai = Pegawai2::find($id);
    $disable = true;
    return view('approval', ['pegawai' => $pegawai, 'disable' => $disable]);
  }

  // Approval page
  public function approval_all(Request $request)
  {
    $id = auth()->user()->pegawai_id;

    $pegawai = Pegawai2::find($id);

    $pengajuan = Pengajuan2::where([
      ['unit_id', $pegawai->unit_id],
      ['jabatan_id', 1]
    ])
    ->orderBy('id', 'desc')
    ->get();

    return $pengajuan;
  }

  public function karyawan() {
    return view("karyawan");
  }

  public function karyawan_all() {
    $id = auth()->user()->pegawai_id;
    $pegawai = Pegawai2::find($id);
    $karyawan = Pegawai2::where([
        ['unit_id', $pegawai->unit_id],
        ['jabatan_id', 1]
      ])->get();
    return $karyawan;
  }

  // Update status cuti
  public function status(Request $request, $id) {
    $pengajuan = Pengajuan::find($id);
    $pengajuan->status = $request->status;
    $pengajuan->keterangan = $request->keterangan;
    $pengajuan->save();

    if ($pengajuan->status == "Disetujui") {
      Pegawai::where('id', $pengajuan->pegawai_id)
      ->decrement('cuti', $pengajuan->lama_cuti);

      Pengajuan::where('id', $pengajuan->id)
      ->update(['keterangan' => null]);

      return $pengajuan;
    }

    elseif ($pengajuan->status == "Tidak Disetujui") {
      return $pengajuan;
    }

    elseif ($pengajuan->status == "Dibatalkan") {
      Pengajuan::where('id', $pengajuan->id)
      ->update(['keterangan' => null]);

      return $pengajuan;
    }
  }

  // Batalkan cuti
  public function batal($id)
  {
    $pengajuan = Pengajuan::find($id);

    $pengajuan2 = Pengajuan::where('id', '=', $id)
    ->update(['status' => 'Dibatalkan']);

    $cuti = Pegawai::where('id', '=', $pengajuan->pegawai_id)
    ->increment('cuti', $pengajuan->lama_cuti);

    return "Cuti dibatalkan!";
  }
}
