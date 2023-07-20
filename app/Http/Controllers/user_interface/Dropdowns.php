<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inmobiliaria;
use App\Models\Agentes;
use App\Models\Propiedades;
use App\Models\Sector;

class Dropdowns extends Controller
{
  public function index()
  {
    $sectors = Sector::with('ciudad');
    $agentes = Agentes::with('inmobiliaria');
    return view('content.user-interface.ui-dropdowns', compact('sectors','agentes'));
  }

  public function publicacionesPorAgente()
{
    $sectors = Sector::with('ciudad');
    $agentes = Agentes::with('inmobiliaria');
    $user = auth()->user();
    $inmobiliaria = Inmobiliaria::where('user_id', $user->id)->first();
    
    // Obtener los agentes de la inmobiliaria
    $agentes = Agentes::where('inmobiliaria_id', $inmobiliaria->id)->get();

    // Obtener las publicaciones de cada agente
    $propiedadesPorAgente = [];

    foreach ($agentes as $agente) {
      $nombreCompleto = $agente->nombre . ' ' . $agente->apellido;
      $propiedades = Propiedades::where('agentes_id', $agente->id)->get();
      $propiedadesPorAgente[$nombreCompleto] = $propiedades;
  }

    return view('content.user-interface.ui-dropdowns', compact('propiedadesPorAgente','sectors','agentes'));
}
}
