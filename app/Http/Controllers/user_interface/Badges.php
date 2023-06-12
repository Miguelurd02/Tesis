<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use App\Models\Agentes;
use Illuminate\Http\Request;

class Badges extends Controller
{
  public function index()
  {

    $agentes = Agentes::all();
    return view('content.user-interface.ui-badges',compact('agentes'));
  }
}
