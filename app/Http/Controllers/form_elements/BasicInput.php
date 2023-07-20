<?php

namespace App\Http\Controllers\form_elements;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inmobiliaria;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class BasicInput extends Controller
{
  public function index()
  {
    $user = auth()->user();
    return view('content.form-elements.forms-basic-inputs', compact('user'));
  }

  public function editar(Request $request, $id)
  {
    $inmobiliarias = Inmobiliaria::with('user')->find($id);
    $userId = $inmobiliarias->user_id;
    $users = User::find($userId);

    $rules = [
      'imagen' => ['image', 'mimes:jpeg,png,jpg'],
      'telefono' => ['required', 'numeric', 'digits:10'],
      'email' => ['required', 'email', 'ends_with:.com'],
      'direccion' => ['required', 'min:10', 'max:150'],
      'descripcion' => ['required', 'min:50', 'max:400'],
      // Resto de las reglas de validación para otros campos
  ];

  $messages = [
      'nombre.required' => 'El campo Nombre es obligatorio.',
      'nombre.min' => 'El campo Nombre debe tener al menos :min caracteres.',
      'nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
      'nombre.regex' => 'El campo Nombre debe comenzar con una letra mayúscula.',
   

      'telefono.required' => 'El campo Teléfono es obligatorio.',
      'telefono.numeric' => 'El campo Teléfono debe ser numérico.',
      'telefono.digits' => 'El campo Teléfono debe tener :digits dígitos.',

      'email.required' => 'El campo Email es obligatorio.',
      'email.email' => 'El campo Email debe ser una dirección de correo válida.',
      'email.ends_with' => 'El campo Email debe terminar con ".com".',

      'imagen.required' => 'El campo Imagen es obligatorio.',
      'imagen.image' => 'El archivo debe ser una imagen válida.',
      'imagen.mimes' => 'El archivo debe tener una de las siguientes extensiones: JPEG, PNG o JPG.',


      'rif.required' => 'El campo RIF es obligatorio.',
      'rif.numeric' => 'El campo RIF debe ser un número.',
      'rif.digits' => 'El campo RIF debe tener :digits dígitos.',

      'direccion.required' => 'El campo Localización es obligatorio.',
      'direccion.max' => 'El campo Localización no puede exceder los :max caracteres.',
      'direccion.min' => 'El campo Localización debe tener al menos :min caracteres.',

      'descripcion.required' => 'El campo Descripción es obligatorio.',
      'descripcion.min' => 'El campo Descripción debe tener al menos :min caracteres.',
      'descripcion.max' => 'El campo Descripción no puede exceder los :max caracteres.',
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }

    $users->email = $request->email;
    $inmobiliarias->telefono = $request->telefono;
    $inmobiliarias->direccion = $request->direccion;
    $inmobiliarias->descripcion = $request->descripcion;

    if($request->acceso != null){
      $users->acceso = 1;
    }else{
      $users->acceso = 0;
    };

    if ($request->hasFile('imagen')) {
      $archivo = $request->file('imagen');
      $nuevoNombreFoto = time() . '_' . $archivo->getClientOriginalName();
      $rutaDestino = public_path('assets/img/inmobiliarias') . $nuevoNombreFoto;
      $archivo->move(public_path('assets/img/inmobiliarias'), $nuevoNombreFoto);

      // Guardar la nueva foto en la base de datos
      $inmobiliarias->imagen = $nuevoNombreFoto;
  }

    if ($inmobiliarias->save() and $users->save()) {
      return redirect(to: '/perfil/inmobiliaria');
    } else {
      return view('content.form-elements.forms-basic-inputs', compact('inmobiliarias'));
    }
  }
}
