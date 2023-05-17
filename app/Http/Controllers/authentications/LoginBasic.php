<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    if(Auth::check()){
      return redirect()->route('layouts-without-menu');
    }
    return view('content.authentications.auth-login-basic');
  }

  public function login(LoginRequest $request){
    $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('/auth/login-basic')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
  }

  public function authenticated(Request $request, $user){

    if($user->rol=='inmobiliaria')
    return redirect('/layouts/without-navbar')->with('rol', $user->rol);
  }
}
