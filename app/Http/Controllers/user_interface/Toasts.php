<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propiedades;

class Toasts extends Controller
{
  public function index()
  {
    return view('content.user-interface.ui-toasts');
  }

  public function show($id)
  {
    $propiedades = Propiedades::with('agentes','imagenes')->findOrFail($id);
      return view('content.user-interface.ui-toasts', compact('propiedades'));
  }  
}

