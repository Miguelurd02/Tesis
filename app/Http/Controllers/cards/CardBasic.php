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
    $suscriptors = Suscriptor::with('user')->find($id);

    $suscriptors->nombre = $request->nombre;
    $suscriptors->apellido = $request->apellido;
    $suscriptors->user->email = $request->email;

    return $suscriptors;


    return view('content.cards.cards-basic', compact('suscriptors'));
  }
}
