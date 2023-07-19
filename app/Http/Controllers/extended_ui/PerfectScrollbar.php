<?php

namespace App\Http\Controllers\extended_ui;

use App\Http\Controllers\Controller;
use App\Http\Requests\CiudadRequest;
use Illuminate\Http\Request;
use App\Models\Ciudad;
use Illuminate\Support\Facades\Validator;

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

    $rules = [
      'nombre' => ['required', 'min:2', 'max:20', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha','unique:ciudads'],
      // Resto de las reglas de validación para otros campos
  ];

  $messages = [
      'nombre.required' => 'El campo Ciudad es obligatorio.',
      'nombre.min' => 'El campo Ciudad debe tener al menos :min caracteres.',
      'nombre.max' => 'El campo Ciudad no puede tener más de :max caracteres.',
      'nombre.regex' => 'El campo Ciudad debe comenzar con una letra mayúscula y no admite números o caractéres especiales',
      'nombre.unique' => 'La ciudad ingresada ya existe en la base de datos.',
      'nombre.alpha' => 'El campo Ciudad solo puede contener letras.',
      // Resto de los mensajes de error para otras reglas de validación
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }

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
