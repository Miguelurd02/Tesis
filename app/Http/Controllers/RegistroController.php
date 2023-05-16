<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\User;

class RegistroController extends Controller
{
    //
    public function show(){
        return view('content.authentications.auth-register-basic');
    }

    public function register(RegistroRequest $request){
        $user = User::create($request->validated());
    }
}
