<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Models\Pengajuan2;
use App\Models\Pengajuan;
use App\Models\Pegawai2;
use App\Models\Pegawai;
use App\Models\Unit;
use App\Models\Jabatan;

class PengajuanController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  public function pengajuan() {
    $pengajuan = true;
    return view('pengajuan', ['pengajuan' => $pengajuan]);
  }

  public function pengajuan_all(Request $request)
  {
    $pengajuan = Pengajuan2::all();
    return $pengajuan;
  }

  public function pengajuan_user() {
    $id = auth()->user()->pegawai_id;
    $pengajuan = Pengajuan2::where('pegawai_id', $id)->orderBy('id', 'desc')->get();
    return $pengajuan;
  }

  public function approval_all() {
    $id = auth()->user()->pegawai_id;
    $pegawai = Pegawai2::find($id);
    $pengajuan = Pengajuan2::where([
      ['unit_id', $pegawai->unit_id],
      ['jabatan_id', 1]
      ])->get();
      return $pengajuan;
    }

    public function pengajuan_store(Request $request) {
      $this->validate($request,[
        'pegawai_id' => 'required',
        'jenis_cuti' => 'required',
        'tanggal_pengajuan' => 'required',
        'unit_id' => 'required',
        'jabatan_id' => 'required',
      ]);

      $pengajuan = Pengajuan::create([
        'pegawai_id' => $request->pegawai_id,
        'jenis_cuti' => $request->jenis_cuti,
        'tanggal_pengajuan' => $request->tanggal_pengajuan,
        'lama_cuti'=> $request->lama_cuti,
        'mulai'=> $request->mulai,
        'hingga'=> $request->hingga,
        'unit_id'=> $request->unit_id,
        'jabatan_id'=> $request->jabatan_id
      ]);

      if ($request->file) {
        $validator = Validator::make($request->all(), [
          'file' => 'required|mimes:jpeg,png,jpg,pdf|max:2048'
        ]);

        if ($validator->fails()) {
          return redirect()->back()->with('danger', 'Pastikan file berformat .jpeg .jpg .pdf');
        } else {
          $file = $request->file;
          $pegawai_id = $request->pegawai_id;
          $pegawai = Pegawai::find($pegawai_id);
          $file_name = $request->number."_".$pegawai->nama."_".$request->jenis_cuti.".".$file->getClientOriginalExtension();
          Storage::putFileAs('public', $file, $file_name);

          $pengajuan->file = $file_name;
          $pengajuan->save();
        }
      }

      return $pengajuan;
    }

    public function pengajuan_get($id) {
      $pengajuan = Pengajuan2::find($id);
      return $pengajuan;
    }

    public function pengajuan_update(Request $request, $id)
    {
      $this->validate($request,[
        'pegawai_id' => 'required',
        'jenis_cuti' => 'required',
        'tanggal_pengajuan' => 'required',
        'unit_id' => 'required',
        'jabatan_id' => 'required',
      ]);

      $pengajuan = Pengajuan::find($id);

      if ($request->jenis_cuti !== "Tahunan") {
        if ($request->file) {

          $validator = Validator::make($request->all(), [
            'file' => 'mimes:jpeg,png,jpg,pdf|max:2048'
          ]);

          if ($validator->fails()) {
            return redirect()->back()->with('danger', 'Pastikan file berformat .jpeg .jpg .png .pdf');
          }
          Storage::disk('public')->delete($pengajuan->file);
          $file = $request->file;
          $pegawai_id = $request->pegawai_id;
          $pegawai = Pegawai::find($pegawai_id);
          $file_name = $request->number."_".$pegawai->nama."_".$request->jenis_cuti.".".$file->getClientOriginalExtension();
          Storage::putFileAs('public', $file, $file_name);

          $pengajuan->file = $file_name;
        }
      } else {
        Storage::disk('public')->delete($pengajuan->file);
        $pengajuan->file = null;
      }

      $pengajuan->jenis_cuti = $request->jenis_cuti;
      $pengajuan->tanggal_pengajuan = $request->tanggal_pengajuan;
      $pengajuan->lama_cuti = $request->lama_cuti;
      $pengajuan->mulai = $request->mulai;
      $pengajuan->hingga = $request->hingga;
      $pengajuan->save();

      return $pengajuan;
    }

    public function pengajuan_delete($id)
    {
      $pengajuan = Pengajuan::find($id);
      Storage::delete($pengajuan->file);
      $pengajuan->delete();
      return $pengajuan;
    }
  }
