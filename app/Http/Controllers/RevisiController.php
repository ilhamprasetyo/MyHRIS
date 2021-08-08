<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Revisi;
use App\Models\Absensi;

class RevisiController extends Controller
{
    public function revisi(){
      return view('revisi');
    }

    public function approval_revisi(){
      return view('approval_revisi');
    }

    public function revisi_all($id){

      $revisi = DB::table('revisi')
      ->where('pegawai_id', $id)
      ->get();

      return $revisi;
    }

    public function approval_revisi_all(Request $request, $unit_id){
      $approval_revisi = DB::table('revisi')
      ->join('pegawai', 'revisi.pegawai_id', '=', 'pegawai.id')
      ->select('revisi.*', 'pegawai.nama')
      ->where([
        ['pegawai.unit_id', '=', $unit_id],
        ['pegawai.jabatan_id', '=', 1]
      ])->get();

      return $approval_revisi;
    }

    public function revisi_store(Request $request){
      $this->validate($request,[
        'pegawai_id' => 'required',
        'clock_in' => 'required',
        'clock_out' => 'required',
        'date' => 'required',
        'keterangan' => 'required'
      ]);

      $revisi = Revisi::create([
        'absensi_id' => $request->absensi_id,
        'pegawai_id' => $request->pegawai_id,
        'clock_in' => $request->clock_in,
        'clock_out' => $request->clock_out,
        'date' => $request->date,
        'keterangan' => $request->keterangan
      ]);

      if ($request->absensi_id != null) {
        $absensi = Absensi::find($request->absensi_id);
        $absensi->kehadiran = 2;
        $absensi->save();
      }

      return $revisi;
    }

    public function revisi_get($id) {
      $revisi = Revisi::find($id);

      return $revisi;
    }

    public function revisi_update(Request $request, $id){
      $this->validate($request,[
        'clock_in' => 'required',
        'clock_out' => 'required',
        'date' => 'required',
        'keterangan' => 'required'
      ]);

      $revisi = Revisi::find($id);
      $revisi->clock_in = $request->clock_in;
      $revisi->clock_out = $request->clock_out;
      $revisi->date = $request->date;
      $revisi->keterangan = $request->keterangan;
      $revisi->save();

      return $revisi;
    }

    public function approval(Request $request, $id){
      $revisi = Revisi::find($id);
      $absensi = Absensi::find($revisi->absensi_id);

      if ($request->jabatan_id == 2) {
        $revisi->approval_koordinator = $request->status;
        $revisi->save();
      }

      if ($request->jabatan_id == 3) {
        $revisi->approval_hrd = $request->status;
        $revisi->save();
      }

      if ($revisi->approval_koordinator === "Disetujui" && $revisi->approval_hrd === "Disetujui") {
        if ($revisi->absensi_id) {
          $absensi->clock_in = $revisi->clock_in;
          $absensi->clock_out = $revisi->clock_out;
          $absensi->date = $revisi->date;
          $absensi->kehadiran = 3;
          $absensi->save();
        } else {

          $absensi = Absensi::create([
            'pegawai_id' => $revisi->pegawai_id,
            'clock_in' => $revisi->clock_in,
            'clock_out' => $revisi->clock_out,
            'date' => $revisi->date,
            'kehadiran' => 3
          ]);

          return $absensi;
        }
      }
    }
}
