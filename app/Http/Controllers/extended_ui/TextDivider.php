<?php

namespace App\Http\Controllers\extended_ui;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Models\Ciudad;
use App\Models\Sector;
use Illuminate\Http\Request;

class TextDivider extends Controller
{
  public function index()
  {
    $sectors = Sector::with('ciudad')->get();
    $ciudads = Ciudad::all();

    return view('content.extended-ui.extended-ui-text-divider', compact('sectors','ciudads'));
  }

  public function registrar(SectorRequest $request)
  {
    $data = $request->validated();

    $sector = new Sector($data);
    $sector->save();

    return redirect(to: '/localizacion/sector');

  }

  public function editar(Request $request, $id)
  {
    $sectors = Sector::with('ciudad')->find($id);

    $sectors->nombre = $request->sector;

    if ($sectors->save()) {
      return redirect(to: '/localizacion/sector');
    } else {
      return view('content.extended-ui.extended-ui-text-divider', compact('sectors'));
    }
  }

  public function borrar($id)
  {
    $sectors = Sector::with('ciudad')->find($id);

    if (Sector::destroy($id)) {
      return redirect(to: '/localizacion/sector');
    } else {
      return view('content.extended-ui.extended-ui-text-divider', compact('sectors'));
    }
  }
}
