<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\Controller;
use App\Http\Requests\InmobiliariaRequest;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class TabsPills extends Controller
{
  public function index()
  {
    $user = auth()->user();
    return view('content.user-interface.ui-tabs-pills', compact('user'));
  }

  public function registrar(InmobiliariaRequest $request)
  {
    $data = $request->validated();

    
    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/inmobiliarias') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/inmobiliarias'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $data['imagen'] = $nuevoNombreFoto;
    }

    $detalleInmobiliaria = new Inmobiliaria($data);
    $detalleInmobiliaria->save();

    return redirect(to: '/detalles/desactivada');

  }
}
