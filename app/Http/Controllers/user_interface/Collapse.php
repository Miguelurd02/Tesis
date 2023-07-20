<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use App\Models\Agentes;
use App\Models\Ciudad;
use App\Models\Inmobiliaria;
use App\Models\Sector;
use Illuminate\Http\Request;

class Collapse extends Controller
{
  public function index()
  {
    $ciudads = Ciudad::all();
    $sectors = Sector::all();
    $agentes = Agentes::all();
    $user = auth()->user();
    $inmobiliaria = Inmobiliaria::where('user_id', $user->id)->first();
  
  // Obtener los agentes de la inmobiliaria
    $agentesInmu = Agentes::where('inmobiliaria_id', $inmobiliaria->id)->get();

    return view('content.user-interface.ui-collapse', compact('ciudads', 'sectors', 'agentes','user','inmobiliaria','agentesInmu'));
  }

  public function publicar()
  {
    $ciudads = Ciudad::all();
    $sectors = Sector::all();
    $agentes = Agentes::all();
    return view('content.user-interface.ui-collapse', compact('ciudads', 'sectors', 'agentes'));
  }
}
