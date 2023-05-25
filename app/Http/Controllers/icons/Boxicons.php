<?php

namespace App\Http\Controllers\icons;

use App\Models\Propiedades;
use App\Models\Ciudad;
use App\Models\Sector;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Boxicons extends Controller
{
  public function index()
  {

    $propiedades = Propiedades::with(['sector','agentes'])->get();
    $ciudads = Ciudad::all();
    $sectors = Sector::with(['ciudad'])->get();

    return view('content.icons.icons-boxicons', compact('propiedades','ciudads','sectors'));
  }
}
