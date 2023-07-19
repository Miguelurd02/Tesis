<?php

namespace App\Http\Controllers\extended_ui;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectorRequest;
use App\Models\Ciudad;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    $rules = [
      'nombre' => ['required', 'min:2', 'max:20', 'regex:/^[A-Z0-9][A-Za-z0-9\s]+$/', 'unique:sectors'],
      'ciudad_id' => ['required'],
      // Resto de las reglas de validación para otros campos
  ];

  $messages = [
      'nombre.required' => 'El campo Sector es obligatorio.',
      'nombre.min' => 'El campo Sector debe tener al menos :min caracteres.',
      'nombre.max' => 'El campo Sector no puede tener más de :max caracteres.',
      'nombre.regex' => 'El campo Sector debe comenzar con una letra mayúscula y no admite caractéres especiales',
      'nombre.unique' => 'La Sector ingresado ya existe en la base de datos.',
      // Resto de los mensajes de error para otras reglas de validación
      'ciudad_id.required' => 'El campo Ciudad es obligatorio.',
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }

    $sectors->nombre = $request->nombre;
    $sectors->ciudad_id = $request->ciudad_id;

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
