<?php

namespace App\Http\Controllers\cards;

use App\Models\Suscriptor;
use App\Models\User;
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
    $userId = $suscriptors->user_id;
    $users = User::find($userId);

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
