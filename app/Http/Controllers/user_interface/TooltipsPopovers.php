<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agentes;

class TooltipsPopovers extends Controller
{
  public function index()
  {
    $agentes = Agentes::all();

    return view('content.user-interface.ui-tooltips-popovers', compact('agentes'));
 
  }

  public function show($id)
  {
    $agentes = Agentes::with('inmobiliaria','propiedades')->findOrFail($id);
    $propiedades = $agentes->propiedades;
      return view('content.user-interface.ui-tooltips-popovers', compact('agentes','propiedades'));
  }  
}
