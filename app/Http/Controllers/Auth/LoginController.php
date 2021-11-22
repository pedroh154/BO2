<?php

namespace App\Http\Controllers\Auth;
use Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//    public function login(){
 //       $title = 'Login';
 //       return view('auth.login')->with('variavel', $title);
//}
//
  //  public function registrar(){
  //      $title = 'Register';
 //       return view('auth.register')->with('variavel', $title);
  //  }

 //   public function forgotpassword(){
 //       $title = 'forgotpassword';
 //       return view('auth.passwords.reset')->with('variavel', $title);
 //   }
}