<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use App\Models\Pegawai;
use App\Models\Pegawai2;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\Pengajuan2;
use App\Models\User;

class UserController extends Controller
{

  public function user() {
    $id = auth()->user()->pegawai_id;
    $pegawai = Pegawai2::find($id);
    return view('user', ['pegawai' => $pegawai, ]);
  }

  public function pegawai_get() {
    $id = auth()->user()->pegawai_id;
    $pegawai = Pegawai2::find($id);
    return $pegawai;
  }

  public function pengajuan_get() {
    $id = auth()->user()->pegawai_id;
    $pengajuan = Pengajuan2::where('pegawai_id', $id)->orderBy('id', 'desc');
    return $pengajuan;
  }

  // Upload profile photo
  public function upload_photo(Request $request, $id){

    $validator = Validator::make($request->all(), [
      'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
    ]);

    if ($validator->fails()) {
          return redirect()->back()->with('danger', 'Pastikan file berupa gambar berformat .jpeg atau .jpg');
    }

    $pegawai = Pegawai::find($id);
    Storage::delete('storage/'.$pegawai->file);
    $file = $request->file;
    $file_name = $pegawai->id."_".$pegawai->nama.".".$file->getClientOriginalExtension();
    Storage::putFileAs('public/images', $file, $file_name);

    $pegawai->file = $file_name;
    $pegawai->save();

    return $pegawai;
  }

  // Delete photo
  public function delete_photo($id)
  {
    $file = Pegawai::find($id);
    Storage::delete('storage/images/'.$file->file);
    $file->file = null;
    $file->save();
    return $file;
  }

  // Update profile
  public function profile_update(Request $request, $id)
  {
    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required'
    ]);

    $pegawai = Pegawai::find($id);
    $pegawai->nama = $request->nama;
    $pegawai->alamat = $request->alamat;
    $pegawai->save();

    return $pegawai;
  }

  // Profile page
  public function profile()
  {
    return view('profile');
  }
}
