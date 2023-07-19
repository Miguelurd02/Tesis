<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inmobiliaria;
use App\Models\Propiedades;
use App\Models\Agentes;


class InputGroups extends Controller
{
  public function index()
  {
  
    return view('content.form-elements.forms-input-groups');
  }
  
  public function show(){
    $user = auth()->user();
    $inmobiliaria = Inmobiliaria::where('user_id', $user->id)->first();
    
    // Obtener los agentes de la inmobiliaria
    $agentes = Agentes::where('inmobiliaria_id', $inmobiliaria->id)->pluck('id');
    
     // Obtener las últimas 4 propiedades asociadas a los agentes
     $propiedades = Propiedades::whereIn('agentes_id', $agentes)
     ->latest()
     ->take(4)
     ->get();
    return view('content.form-elements.forms-input-groups', compact('propiedades', 'inmobiliaria','user'));
  }
}
