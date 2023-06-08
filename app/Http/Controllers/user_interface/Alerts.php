<?php

namespace App\Http\Controllers\user_interface;

use App\Models\Propiedades;
use App\Models\Inmobiliaria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class Alerts extends Controller
{
  public function index()
  {
    $inmobiliarias = Inmobiliaria::all();
    $propiedades = Propiedades::with(['sector','agentes'])->get();
    return view('content.user-interface.ui-alerts', compact('propiedades','inmobiliarias'));


  }
}
