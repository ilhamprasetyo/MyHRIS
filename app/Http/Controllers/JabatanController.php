<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Jabatan;

class JabatanController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  public function jabatan() {
    return view('jabatan');
  }

  // Jabatan page
  public function jabatan_all()
  {
    $jabatan = Jabatan::all();
    return $jabatan;
  }

  // Insert data to database
  public function jabatan_store(Request $request)
  {
    $this->validate($request,[
      'nama_jabatan' => 'required'
    ]);

    $jabatan = Jabatan::create([
      'nama_jabatan' => $request->nama_jabatan,
    ]);

    return $jabatan;
  }

  public function jabatan_get($id) {
    $jabatan = Jabatan::find($id);

    return $jabatan;
  }

  // Update data
  public function jabatan_update(Request $request, $id)
  {
    $this->validate($request,[
      'nama_jabatan' => 'required',
    ]);

    $jabatan = Jabatan::find($id);
    $jabatan->nama_jabatan = $request->nama_jabatan;
    $jabatan->save();

    return $jabatan;
  }

  // Delete data
  public function jabatan_delete($id)
  {
    $jabatan = Jabatan::find($id);
    $jabatan->delete();

    return $jabatan;
  }

}
