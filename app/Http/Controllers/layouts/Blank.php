<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuscriptorRequest;
use App\Models\Suscriptor;
use Illuminate\Http\Request;

class Blank extends Controller
{
  public function index()
  {
    $user = auth()->user();
    return view('content.layouts-example.layouts-blank', compact('user'));
  }

  public function registrar(SuscriptorRequest $request)
  {
    $data = $request->validated();

    $detalleSuscriptor = new Suscriptor($data);
    $detalleSuscriptor->save();

    return redirect(to: '/inicio/filtro');

  }
}
