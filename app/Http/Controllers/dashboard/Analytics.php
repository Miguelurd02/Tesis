<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Agentes;
use App\Models\Ciudad;
use App\Models\Inmobiliaria;
use App\Models\Propiedades;
use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Analytics extends Controller
{
  public function index()
  {
    $usuariosCount = User::count();
    $inmobiliariasCount = Inmobiliaria::count();
    $agentesCount = Agentes::count();
    $ciudadesCount = Ciudad::count();
    $sectoresCount = Sector::count();
    $propiedadesCount = Propiedades::count();

    return view('content.dashboard.dashboards-analytics', compact(
        'usuariosCount',
        'inmobiliariasCount',
        'agentesCount',
        'ciudadesCount',
        'sectoresCount',
        'propiedadesCount'
    ));
  }
}
