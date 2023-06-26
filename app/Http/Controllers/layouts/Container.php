<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgenteRequest;
use App\Models\Agentes;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class Container extends Controller
{
  public function index()
  {
    $agentes = Agentes::with('inmobiliaria')->get();
    $inmobiliarias = Inmobiliaria::all();
    return view('content.layouts-example.layouts-container',compact('agentes','inmobiliarias'));
  }
  
  public function registrar(AgenteRequest $request)
  {
    $data = $request->validated();

    $agente = new Agentes($data);
    $agente->save();

    return redirect(to: '/inmobiliarias/agentes');

  }

  public function editar(Request $request, $id)
  {
    $agentes = Agentes::with('inmobiliaria')->find($id);

    $agentes->nombre = $request->sector;

    if ($agentes->save()) {
      return redirect(to: '/inmobiliarias/agentes');
    } else {
      return view('content.layouts-example.layouts-container', compact('sectors'));
    }
  }

  public function borrar($id)
  {
    $sectors = Agentes::with('ciudad')->find($id);

    if (Agentes::destroy($id)) {
      return redirect(to: '/inmobiliarias/agentes');
    } else {
      return view('content.layouts-example.layouts-container', compact('sectors'));
    }
  }
}
