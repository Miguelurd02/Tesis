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
    $inmobiliarias->rif = $request->rif;
    $users->email = $request->email;
    $inmobiliarias->telefono = $request->telefono;
    $inmobiliarias->direccion = $request->direccion;
    $inmobiliarias->descripcion = $request->descripcion;

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/inmobiliarias') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/inmobiliarias'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $inmobiliarias->imagen = $nuevoNombreFoto;
  }

    if ($inmobiliarias->save() and $users->save()) {
      return redirect(to: '/inmobiliarias/empresas');
    } else {
      return view('content.layouts-example.layouts-fluid', compact('inmobiliarias'));
    }
  }

  public function borrar($id)
  {
    $inmobiliarias = Inmobiliaria::with('user')->find($id);
    $userId = $inmobiliarias->user_id;

    if (Inmobiliaria::destroy($id) and User::destroy($userId)) {
      return redirect(to: '/inmobiliarias/empresas');
    } else {
      return view('content.layouts-example.layouts-fluid', compact('inmobiliarias'));
    }
  }
}
