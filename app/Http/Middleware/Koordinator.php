<?php

namespace App\Http\Middleware;

use Closure;

class Koordinator
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    if(auth()->user()->jabatan_id == 2){
      return $next($request);
    }

    else {
      return redirect()->back()->with('danger', 'Akses anda dibatasi');
    }
  }
}
