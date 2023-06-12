<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inmobiliaria;
class Typography extends Controller
{
  public function index()
  {
    $inmobiliarias = Inmobiliaria::all();
    return view('content.user-interface.ui-typography', compact('inmobiliarias'));
  }

  public function show($id)
  {
    $inmobiliaria = Inmobiliaria::with('user','agentes.propiedades')->findOrFail($id);
      return view('content.user-interface.ui-typography', compact('inmobiliaria'));
  }  

}
