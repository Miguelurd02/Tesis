<?php

namespace App\Http\Controllers\cards;

use App\Models\Suscriptor;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CardBasic extends Controller
{
  public function index()
  {
    $suscriptors = Suscriptor::with('user')->get();


    return view('content.cards.cards-basic', compact('suscriptors'));
  }

  public function editar(Request $request, $id)
  {
    $suscriptors = Suscriptor::with('user')->find($id);
    $userId = $suscriptors->user_id;
    $users = User::find($userId);

    $rules = [
      'nombre' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
      'apellido' => ['required', 'min:2', 'max:12', 'regex:/^[A-Z][A-Za-z]+$/', 'alpha'],
      'telefono' => ['required', 'numeric', 'digits:10'],
      'email' => ['required', 'email','ends_with:.com'],
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
      // Resto de los mensajes de error para otras reglas de validación

      'telefono.required' => 'El campo Teléfono es obligatorio.',
      'telefono.numeric' => 'El campo Teléfono debe ser numérico.',
      'telefono.digits' => 'El campo Teléfono debe tener :digits dígitos.',

      'email.required' => 'El campo Correo electrónico es obligatorio.',
      'email.email' => 'El campo Correo electrónico debe ser una dirección de correo válida.',
      'email.ends_with' => 'El campo Correo electrónico debe terminar con ".com".',
  ];

  $validator = Validator::make($request->all(), $rules, $messages);

  if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
  }
    $suscriptors->nombre = $request->nombre;
    $suscriptors->apellido = $request->apellido;
    $users->email = $request->email;
    $suscriptors->telefono = $request->telefono;

    if ($suscriptors->save() and $users->save()){
      return redirect(to:'/usuarios/listado');
    }else{
      return view('content.cards.cards-basic', compact('suscriptors'));
    }
  }

  public function borrar($id)
  { 
    $suscriptors = Suscriptor::with('user')->find($id);
    $userId = $suscriptors->user_id;

    if (Suscriptor::destroy($id) and User::destroy($userId)){
      return redirect(to:'/usuarios/listado');
    }else{
      return view('content.cards.cards-basic', compact('suscriptors'));
    }
  }
}
