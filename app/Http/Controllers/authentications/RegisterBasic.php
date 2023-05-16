<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  public function register(RegistroRequest $request){
    $user = User::create($request->validated());
    return redirect('/auth/login-basic')->with('succes', 'Se creo la cuenta exitosamente');
}
}
