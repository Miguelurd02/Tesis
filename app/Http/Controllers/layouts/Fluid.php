<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\InmobiliariaRequest;
use App\Models\User;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class Fluid extends Controller
{
  public function index()
  {
    $inmobiliarias = Inmobiliaria::with('user')->get();

    return view('content.layouts-example.layouts-fluid', compact('inmobiliarias'));
  }

  public function editar(Request $request, $id)
  {
    $inmobiliarias = Inmobiliaria::with('user')->find($id);
    $userId = $inmobiliarias->user_id;
    $users = User::find($userId);

    $inmobiliarias->nombre = $request->nombre;
    $inmobiliarias->imagen = $request->imagen;
    $inmobiliarias->rif = $request->rif;
    $users->email = $request->email;
    $inmobiliarias->telefono = $request->telefono;
    $inmobiliarias->direccion = $request->direccion;
    $inmobiliarias->descripcion = $request->descripcion;

    if ($inmobiliarias->save() and $users->save()) {
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
