<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\InmobiliariaRequest;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class Fluid extends Controller
{
  public function index()
  {
    $inmobiliarias = Inmobiliaria::with('user')->get();

    return view('content.layouts-example.layouts-fluid', compact('inmobiliarias'));
  }

  public function registrar(InmobiliariaRequest $request)
  {
    $data = $request->validated();

    $empresa = new Inmobiliaria($data);
    $empresa->save();

    return redirect(to: '/inmobiliarias/empresas');

  }

  public function editar(Request $request, $id)
  {
    $inmobiliarias = Inmobiliaria::with('user')->find($id);

    $inmobiliarias->nombre = $request->sector;

    if ($inmobiliarias->save()) {
      return redirect(to: '/inmobiliarias/empresas');
    } else {
      return view('content.extended-ui.extended-ui-text-divider', compact('inmobiliarias'));
    }
  }

  public function borrar($id)
  {
    $inmobiliarias = Inmobiliaria::with('user')->find($id);

    if (Inmobiliaria::destroy($id)) {
      return redirect(to: '/inmobiliarias/empresas');
    } else {
      return view('content.extended-ui.extended-ui-text-divider', compact('inmobiliarias'));
    }
  }
}
