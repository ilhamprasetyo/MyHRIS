<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next) {
    if(auth()->user()->jabatan_id === 0){
      return $next($request);
    } else {
      return redirect()->back()->with('danger', 'Tidak bisa akses halaman tersebut');
    }
  }
}
