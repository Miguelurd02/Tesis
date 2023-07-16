<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use App\Models\Agentes;
use App\Models\Ciudad;
use App\Models\Sector;
use Illuminate\Http\Request;

class Collapse extends Controller
{
  public function index()
  {
    $ciudads = Ciudad::all();
    $sectors = Sector::all();
    $agentes = Agentes::all();
    return view('content.user-interface.ui-collapse', compact('ciudads', 'sectors', 'agentes'));
  }

  public function publicar()
  {
    $ciudads = Ciudad::all();
    $sectors = Sector::all();
    $agentes = Agentes::all();
    return view('content.user-interface.ui-collapse', compact('ciudads', 'sectors', 'agentes'));
  }
}
