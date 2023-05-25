<?php

namespace App\Http\Controllers\user_interface;
use App\Models\Propiedades;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Accordion extends Controller
{
  public function index()
  {
    $propiedades = Propiedades::with(['sector','sector.ciudad','agentes'])->get();
    return view('content.user-interface.ui-accordion', compact('propiedades'));

  }
}

