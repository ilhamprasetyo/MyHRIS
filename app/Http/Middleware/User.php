<?php

namespace App\Http\Middleware;

use Closure;

class User
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
    if(auth()->user()->jabatan_id === 0){
      return redirect()->back()->with('danger', 'Akses anda dibatasi');
    }

    else {
      return $next($request);
    }
  }
}
