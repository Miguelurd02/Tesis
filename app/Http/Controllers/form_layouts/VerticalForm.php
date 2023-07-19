<?php

namespace App\Http\Controllers\form_layouts;

use App\Http\Controllers\Controller;
use App\Models\Agentes;
use App\Models\Inmobiliaria;
use App\Models\Propiedades;
use Illuminate\Http\Request;

class VerticalForm extends Controller
{
  public function index()
  {
    return view('content.form-layout.form-layouts-vertical');
  }

  public function agentesPorPropiedad()
{
  $user = auth()->user();
  $inmobiliaria = Inmobiliaria::where('user_id', $user->id)->first();
  
  // Obtener los agentes de la inmobiliaria
  $agentes = Agentes::where('inmobiliaria_id', $inmobiliaria->id)->get();

    return view('content.form-layout.form-layouts-vertical', compact('agentes'));
}
}
