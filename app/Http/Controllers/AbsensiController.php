<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Absensi;

class AbsensiController extends Controller
{
    public function index(){
      return view("absensi");
    }

    public function absensi($id){
      $absensi = DB::table("absensi")
      ->where("pegawai_id", $id)
      ->get();
      return $absensi;
    }

    public function clock_in(Request $request){
      $this->validate($request,[
        'pegawai_id' => 'required',
        'clock_in' => 'required',
        'date_now' => 'required',
      ]);

      $absensi = Absensi::create([
        'pegawai_id' => $request->pegawai_id,
        'clock_in' => $request->clock_in,
        'date' => $request->date_now,
        'kehadiran' => 0,
      ]);

      return $absensi;
    }

    public function absensi_get(Request $request, $id){
      $absensi = Absensi::find($id);
      return $absensi;
    }

    public function clock_out(Request $request, $id){
      $this->validate($request, [
        'clock_out' => 'required',
      ]);

      $absensi = Absensi::find($id);
      $absensi->clock_out = $request->clock_out;
      $absensi->kehadiran = 1;
      $absensi->save();

      return $absensi;
    }

    public function absensi_delete(Request $request, $id){
      $absensi = Absensi::find($id);
      $absensi->delete();

      return $absensi;
    }


}
