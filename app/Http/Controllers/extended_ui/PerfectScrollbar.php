<?php

namespace App\Http\Controllers\extended_ui;

use App\Http\Controllers\Controller;
use App\Http\Requests\CiudadRequest;
use Illuminate\Http\Request;
use App\Models\Ciudad;

class PerfectScrollbar extends Controller
{
  public function index()
  {
    $ciudads = Ciudad::all();
    return view('content.extended-ui.extended-ui-perfect-scrollbar', compact('ciudads'));
  }

  public function registrar(CiudadRequest $request)
  {
    $data = $request->validated();

    $ciudad = new Ciudad($data);
    $ciudad->save();

    return redirect(to: '/localizacion/ciudad');

  }

  public function editar(Request $request, $id)
  {
    $ciudads = Ciudad::find($id);

    $ciudads->nombre = $request->nombre;

    if ($ciudads->save()) {
      return redirect(to: '/localizacion/ciudad');
    } else {
      return view('content.extended-ui.extended-ui-perfect-scrollbar', compact('ciudads'));
    }
  }

  public function borrar($id)
  {
    $ciudads = Ciudad::find($id);

    if (Ciudad::destroy($id)) {
      return redirect(to: '/localizacion/ciudad');
    } else {
      return view('content.extended-ui.extended-ui-perfect-scrollbar', compact('ciudads'));
    }
  }
}
