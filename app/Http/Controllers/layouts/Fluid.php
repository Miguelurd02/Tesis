<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use App\Models\Inmobiliaria;
use Illuminate\Http\Request;

class Fluid extends Controller
{
  public function index()
  {
    $inmobiliaria = Inmobiliaria::with('user')->get();

    return view('content.layouts-example.layouts-fluid', compact('inmobiliaria'));
  }
}
