<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/admin/route';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->jabatan_id == 0) {
              return redirect('/pegawai')->with('success', 'Anda berhasil masuk');
            } elseif (auth()->user()->jabatan_id == 3) {
              return redirect('/hrd')->with('success', 'Anda berhasil masuk');
            } else {
              return redirect('/user')->with('success', 'Anda berhasil masuk');
            }
        } else {
          return redirect()->back()->with('danger','Email & Password are incorrect.');
        }
    }

    public function logout(Request $request) {
      Auth::logout();

      if($request->session()->get('change')) {
        $request->session()->forget('change');
        return redirect('/')->with('success', 'Profile berhasil di-update, silahkan login kembali');
      } else {
        return redirect('/')->with('success', 'Anda berhasil keluar');
      }
    }
}
