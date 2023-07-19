<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgenteRequest;
use App\Models\Agentes;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/agentes') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/agentes'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $data['imagen'] = $nuevoNombreFoto;
    }

    $agente = new Agentes($data);
    $agente->save();

    return redirect(to: '/inmobiliarias/agentes');

  }

  public function editar(Request $request, $id)
  {
    $agentes = Agentes::with('inmobiliaria')->find($id);

    $rules = [
      'nombre' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
      'apellido' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
      'telefono' => ['required', 'numeric', 'digits:10'],
      'email' => ['required', 'email','ends_with:.com'],
      'inmobiliaria_id' => ['required'],
      'imagen' => ['image', 'mimes:jpeg,png,jpg'],
      // Resto de las reglas de validación para otros campos
  ];

  $messages = [
      'nombre.required' => 'El campo Nombre es obligatorio.',
      'nombre.min' => 'El campo Nombre debe tener al menos :min caracteres.',
      'nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
      'nombre.regex' => 'El campo Nombre debe comenzar con una letra mayúscula y no admite espacios, números o caractéres especiales',
      // Resto de los mensajes de error para otras reglas de validación

      'apellido.required' => 'El campo Apellido es obligatorio.',
      'apellido.min' => 'El campo Apellido debe tener al menos :min caracteres.',
      'apellido.max' => 'El campo Apellido no puede tener más de :max caracteres.',
      'apellido.regex' => 'El campo Apellido debe comenzar con una letra mayúscula y no admite espacios, números o caractéres especiales',
      

      'telefono.required' => 'El campo Teléfono es obligatorio.',
      'telefono.numeric' => 'El campo Teléfono debe ser numérico.',
      'telefono.digits' => 'El campo Teléfono debe tener :digits dígitos.',

      'email.required' => 'El campo Correo electrónico es obligatorio.',
      'email.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
      'email.ends_with' => 'El campo Correo electrónico debe terminar con ".com".',

      'inmobiliaria_id.required' => 'El campo Inmobiliaria es obligatorio.',

      'imagen.required' => 'El campo Imagen es obligatorio.',
      'imagen.image' => 'El archivo debe ser una imagen válida.',
      'imagen.mimes' => 'El archivo debe tener una de las siguientes extensiones: JPEG, PNG o JPG.',
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }

    $agentes->nombre = $request->nombre;
    $agentes->apellido = $request->apellido;
    $agentes->telefono = $request->telefono;
    $agentes->email = $request->email;
    $agentes->inmobiliaria_id = $request->inmobiliaria_id;

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/agentes') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/agentes'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $agentes->imagen = $nuevoNombreFoto;
  }

    if ($agentes->save()) {
      return redirect(to: '/inmobiliarias/agentes');
    } else {
      return view('content.layouts-example.layouts-container', compact('sectors'));
    }
  }

  public function borrar($id)
  {
    $agentes = Agentes::with('inmobiliaria')->find($id);

    if (Agentes::destroy($id)) {
      return redirect(to: '/inmobiliarias/agentes');
    } else {
      return view('content.layouts-example.layouts-container', compact('agentes'));
    }
  }
}
