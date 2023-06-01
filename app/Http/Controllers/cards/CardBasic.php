<?php

namespace App\Http\Controllers\cards;

use App\Models\Suscriptor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardBasic extends Controller
{
  public function index()
  {
    $suscriptors = Suscriptor::with('user')->get();


    return view('content.cards.cards-basic', compact('suscriptors'));
  }

  public function editar(Request $request, $id)
  {
    $suscriptors = Suscriptor::with('user')->findOrFail($id);

    $suscriptors->nombre = $request->input('nombre');
    $suscriptors->apellido = $request->input('apellido');
    $suscriptors->user->email = $request->input('correo');
    $suscriptors->telefono = $request->input('telefono');
    $suscriptors->save();


    return response()->json(['success' => true]);
  }
}
