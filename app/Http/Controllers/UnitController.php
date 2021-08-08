<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Unit;

class UnitController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  public function unit() {
    return view('unit');
  }

  // Unit page
  public function unit_all()
  {
    $unit = Unit::all();
    return $unit;
  }

  // Insert data to database
  public function unit_store(Request $request)
  {
    $this->validate($request,[
      'nama_unit' => 'required'
    ]);
    $unit = Unit::create([
      'id' => $request->id,
      'nama_unit' => $request->nama_unit
    ]);
    return $unit;
  }

  public function unit_get($id)
  {
    $unit = Unit::find($id);
    return $unit;
  }

  // Update data
  public function unit_update(Request $request, $id)
  {
    $this->validate($request,[
      'nama_unit' => 'required',
    ]);
    $unit = Unit::find($id);
    $unit->nama_unit = $request->nama_unit;
    $unit->save();
    return $unit;
  }

  // Delete data
  public function unit_delete($id)
  {
    $unit = Unit::find($id);
    $unit->delete();
    return $unit;
  }
}
