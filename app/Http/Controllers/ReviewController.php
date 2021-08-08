<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Review;

class ReviewController extends Controller
{
  /**
  * Show a list of all of the application's users.
  *
  * @return Response
  */

  public function getAllReview()
  {
    $review = DB::table('review')
    ->orderBy('id', 'desc')
    ->get();

    return $review;
  }

  public function filterReview(Request $request)
  {
    $filter = $request->filter;
    $review = DB::table('review')->where('name', 'like', "%$filter%")->get();

    return $review;
  }

  public function edit($id) // for edit and show
  {
    $review = Review::find($id);

    return $review;
  }

  public function update(Request $request, $id)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    $review = Review::find($id);
    $review->name = $request->name;
    $review->email = $request->email;
    $review->message = $request->message;
    $review->save();

    $msg = [
      'success' => true,
      'message' => 'Article updated successfully'
    ];

    return response()->json($msg);
  }

  public function delete($id)
  {
    $review = Review::find($id);
    if(!empty($review)){
      $review->delete();
      $msg = [
        'success' => true,
        'message' => 'Review deleted successfully!'
      ];
      return response()->json($msg);
    } else {
      $msg = [
        'success' => false,
        'message' => 'Review deleted failed!'
      ];
      return response()->json($msg);
    }
  }


  // Insert data to database
  public function store(Request $request) {

    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    $review = Review::create([
      'name' => $request->name,
      'email' => $request->email,
      'message' => $request->message
    ]);

    return $review;
  }

  public function k(Request $request, $id)
  {
    $this->validate($request,[
      'name' => 'required',
      'email' => 'required',
      'message' => 'required'
    ]);

    $review = Review::find($id);
    $review->name = $request->name;
    $review->email = $request->email;
    $review->message = $request->message;
    $review->save();

    return $review;
  }

  public function d($id)
  {
    $review = Review::find($id);
    $review->delete();
    return $review;
  }
}
