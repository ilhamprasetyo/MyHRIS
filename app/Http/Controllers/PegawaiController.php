<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


use App\Models\Pegawai;
use App\Models\Pegawai2;
use App\Models\Unit;
use App\Models\Jabatan;
use App\Models\User;

class PegawaiController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  public function pegawai()
  {
    return view('pegawai');
  }

  public function pegawai_all()
  {
    $pegawai = Pegawai2::orderBy('id', 'desc')->get();
    return $pegawai;
  }


  // Insert data
  public function pegawai_store(Request $request)
  {
    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
      'cuti' => 'required'
    ]);

    $pegawai = Pegawai::create([
      'nama' => $request->nama,
      'alamat' => $request->alamat,
      'unit_id'=> $request->unit_id,
      'jabatan_id'=> $request->jabatan_id,
      'cuti'=> $request->cuti
    ]);

    return $pegawai;
  }

  public function pegawai_get($id)
  {
    $pegawai = Pegawai2::find($id);
    return $pegawai;
  }

  // Update data
  public function pegawai_update(Request $request, $id)
  {
    $this->validate($request,[
      'nama' => 'required',
      'alamat' => 'required',
      'unit_id' => 'required',
      'jabatan_id' => 'required',
      'cuti' => 'required'
    ]);

    $pegawai = Pegawai::find($id);
    $pegawai->nama = $request->nama;
    $pegawai->alamat = $request->alamat;
    $pegawai->unit_id = $request->unit_id;
    $pegawai->jabatan_id = $request->jabatan_id;
    $pegawai->cuti = $request->cuti;
    $pegawai->save();

    return $pegawai;
  }

  // Delete data
  public function pegawai_delete($id)
  {
    $pegawai = Pegawai::find($id);
    $pegawai->delete();
    return $pegawai;
  }

  public function pegawai_user() {
    $id = auth()->user();
    $pegawai = Pegawai2::find($id->pegawai_id);
    return [
      'id' => $id,
      'pegawai' => $pegawai
    ];
  }

  // Check your ID (Registrasi)
  public function check(Request $request)
  {
    if($request->session()->has('key')) {
      $request->session()->forget('key');
      return view('/check');
    } else {
      return view('check');
    }
  }

  // Membuat session supaya page checked tidak bisa diakses sebelum input ID di page check
  public function request(Request $request)
  {
    $check = $request->check;
    $request->session()->put('session', $check);
    $request->session()->put('key', 'check');
    return redirect('/checked');
  }

  // Checked page
  public function checked(Request $request) {
    $check = $request->session()->get('session');

    if($request->session()->has('key')) {
      $pegawai = DB::table('pegawai')
      ->where('id','=',$check)->first();

      $user = DB::table('users')
      ->where('pegawai_id','=',$check)
      ->exists();

      if ($pegawai === null) {
        $request->session()->forget('key');
        return redirect('/check')->with('warning','ID tidak ditemukan!');
      }

      elseif ($user) {
        $request->session()->forget('key');
        return redirect('/check')->with('info','Pegawai dengan ID ini sudah melakukan registrasi');
      }

      else {
        $pegawai = DB::table('pegawai2')
        ->where('id','=',$check)
        ->first();
        return view('checked', ['pegawai' => $pegawai]);
      }
    }

    else {
      $request->session()->forget('key');
      return redirect('/check')->with('info','Silahkan input ID');
    }
  }

  // Insert data
  public function registered(Request $request)
  {

    $email = DB::table('users')
    ->where('email', '=', $request->email)
    ->exists();

    if ($email) {
      return redirect()->back()->with('info', 'Email sudah terpakai');
    }

    else {
      $this->validate($request,[
        'pegawai_id' => 'required',
        'email' => 'required',
        'unit_id' => 'required',
        'jabatan_id' => 'required',
        'password' => 'required',
      ]);

      User::create([
        'pegawai_id' => $request->get('pegawai_id'),
        'email' => $request->get('email'),
        'unit_id' => $request->get('unit_id'),
        'jabatan_id' => $request->get('jabatan_id'),
        'password'=> Hash::make($request['password']),
      ]);

      $request->session()->forget('key');
      return redirect('/')->with('info', 'Email dan Password berhasil dibuat, silahkan login');
    }

  }

  public function download($id) {

    $pegawai = Pegawai::find($id);
    $file = public_path(). "/storage/images/$pegawai->file";

    $headers = array(
      'Content-Type: application/pdf',
    );

    return response()->download($file);

  }

}
